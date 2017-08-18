<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use App\Services\ErrorService;
use App\Services\ReportService;
use App\Services\WorkShiftService;
use Illuminate\Http\Request;
use function Sodium\add;


class AdminController extends MainController
{
    public function __construct(ErrorService $errorService, WorkShiftService $workShiftService, ReportService $reportService)
    {
        $this->errorService = $errorService;
        $this->workShiftService = $workShiftService;
        $this->reportService = $reportService;
        $this->navbar = $this->getAdminNavbar();
    }


    public function showMain()
    {
        $this->title = 'Admin page';
        $this->template = 'admin.main';

        $this->addVars('activeErrors', $this->errorService->getActiveError());
        $this->addVars('workShift', $this->workShiftService->getActiveWorkShift());

        return $this->renderOutput();

    }

    public function showMessages()
    {
        $this->title = "Messages from waiters";
        $this->template = 'admin.messages';

        $this->addVars('errors', $this->errorService->getAll());

        return $this->renderOutput();

    }

    public function deleteMessage($id)
    {
        $this->errorService->deleteById($id);

        return redirect(route('admin_messages'));
    }


    public function openShift()
    {
        $this->workShiftService->openShift();

        return redirect(route('admin_main'))->with('message', 'Work shift is open');
    }

    public function closeShift()
    {
        $reportId = $this->workShiftService->closeShift();

        return redirect(route('shift_report', ['id' => $reportId]));
    }

    public function allShift()
    {
        $this->title = 'All work shifts';
        $this->template = 'admin.shifts';


        $this->addVars('shifts', $this->workShiftService->getAll());

        return $this->renderOutput();
    }


    public function getReport($id)
    {

        $this->addVars('report', $this->reportService->getGeneralReport($id));

        $this->title = 'Report';
        $this->template = 'admin.report';

        return $this->renderOutput();
    }


}
