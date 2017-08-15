<?php


namespace App\Services\Implementation;


use App\Services\TableService;

/**
 * @method ololo()
 */
class TableServiceImpl extends MainService implements TableService
{


    public function getAllTable()
    {
        return $this->floorRepository->findAll();
    }

}