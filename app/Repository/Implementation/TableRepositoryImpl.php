<?php


namespace App\Repository\Implementation;

use App\Repository\TableRepository;
use App\Model\Table;

class TableRepositoryImpl extends MainRepository implements TableRepository
{

    public function __construct(Table $model)
    {
        parent::__construct($model);
    }

}