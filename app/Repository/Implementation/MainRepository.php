<?php

namespace App\Repository\Implementation;

use \App\Repository\MainRepository as Repository;
use Illuminate\Database\Eloquent\Model;

class MainRepository implements Repository
{

    protected $model;

    public function __construct(Model $model)
    {

        $this->model = $model;
    }


    public function findAll()
    {
        return $this->model->select()->get();
    }

    public function findById($id)
    {
        $model = $this->model->where('id', '=', $id)->first();
        return $model;
    }

    public function save(Model $model)
    {
        $model->save();
        return $model;
    }

    public function selectWhere($conditions = [])
    {
        return $this->model->where($conditions)->first();
    }

    public function count()
    {
        return $this->model->count();
    }

    public function delete($id)
    {
        $this->model::destroy($id);
    }



}