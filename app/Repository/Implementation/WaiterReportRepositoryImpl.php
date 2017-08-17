<?php


namespace App\Repository\Implementation;

use App\Model\WaiterReport;
use App\Repository\WaiterReportRepository;


class WaiterReportRepositoryImpl extends MainRepository implements WaiterReportRepository
{
    public function __construct(WaiterReport $model)
    {
        parent::__construct($model);
    }


}