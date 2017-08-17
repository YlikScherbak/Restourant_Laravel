<?php


namespace App\Services\Implementation;


use App\Model\GeneralReport;
use App\Model\WaiterReport;
use App\Model\WorkShift;
use App\Services\WorkShiftService;
use Carbon\Carbon;

class WorkShiftServiceImpl extends MainService implements WorkShiftService
{
    public function getActiveWorkShift()
    {
        return $this->workShiftRepository->selectWhere([['active' , '=', true]]);
    }

    public function openShift()
    {
        if (is_null($this->workShiftRepository->selectWhere([['active' , '=', true]]))){
            $workShift = new WorkShift(['active' => true, 'creation_date' => Carbon::now()]);
            $this->workShiftRepository->save($workShift);
            return;
        }

        abort(403, 'Work shift is already open');
    }

    public function closeShift()
    {
        $workShift = $this->getActiveWorkShift();
        $workShift->active = false;
        $this->workShiftRepository->save($workShift);

        $waiterReportData = $this->orderRepository->getReportInfo($workShift->id);

        $generalReport = new GeneralReport(['total_amount' => 0, 'discount_amount' => 0]);
        $generalReport->workShift()->associate($workShift);
        $generalReport = $this->genRepRepository->save($generalReport);

        $totalAmount = 0;
        $discountAmount = 0;
        foreach ($waiterReportData as $reportData){
            $waiterReport = new WaiterReport(['total_amount' => $reportData->total_amount, 'discount_amount' => $reportData->discount_amount]);
            $waiterReport->waiter = ($this->userRepository->findById($reportData->user_id))->username;
            $waiterReport->generalReport()->associate($generalReport);
            $this->waiterRepRepository->save($waiterReport);
            $totalAmount += $reportData->total_amount;
            $discountAmount += $reportData->discount_amount;
        }

        $generalReport->total_amount = $totalAmount;
        $generalReport->discount_amount = $discountAmount;

        $generalReport = $this->genRepRepository->save($generalReport);

        return $generalReport;
    }


}