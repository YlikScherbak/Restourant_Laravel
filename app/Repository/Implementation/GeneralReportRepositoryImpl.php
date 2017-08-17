<?php


namespace App\Repository\Implementation;


use App\Model\GeneralReport;
use App\Repository\GeneralReportRepository;


class GeneralReportRepositoryImpl extends MainRepository implements GeneralReportRepository
{
    public function __construct(GeneralReport $model)
    {
        parent::__construct($model);
    }


}