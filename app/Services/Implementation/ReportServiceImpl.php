<?php


namespace App\Services\Implementation;


use App\Services\ReportService;

class ReportServiceImpl extends MainService implements ReportService
{


    public function getGeneralReport($id)
    {
        return $this->genRepRepository->findById($id);
    }


}