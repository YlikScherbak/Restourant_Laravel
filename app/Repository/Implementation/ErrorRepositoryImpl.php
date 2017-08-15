<?php


namespace App\Repository\Implementation;


use App\Model\Error;
use App\Repository\ErrorRepository;


class ErrorRepositoryImpl extends MainRepository implements ErrorRepository
{
    public function __construct(Error $model)
    {
        parent::__construct($model);
    }


}