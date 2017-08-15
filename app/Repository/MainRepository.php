<?php


namespace App\Repository;


use Illuminate\Database\Eloquent\Model;

interface MainRepository
{

    public function findAll();

    public function  findById($id);

    public function save(Model $model);

    public function selectWhere($conditions = []);

}