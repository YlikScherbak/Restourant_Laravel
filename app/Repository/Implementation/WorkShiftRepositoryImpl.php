<?php


namespace App\Repository\Implementation;


use App\Model\WorkShift;
use App\Repository\WorkShiftRepository;


class WorkShiftRepositoryImpl extends MainRepository implements WorkShiftRepository
{
    public function __construct(WorkShift $model)
    {
        parent::__construct($model);
    }

    public function findAll()
    {
        return $this->model->with('generalReport')->paginate(10);
    }


}