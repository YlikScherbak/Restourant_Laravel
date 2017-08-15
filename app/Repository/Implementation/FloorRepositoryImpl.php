<?php


namespace App\Repository\Implementation;

use App\Repository\FloorRepository;
use App\Model\Floor;

class FloorRepositoryImpl extends MainRepository implements FloorRepository
{
    public function __construct(Floor $model)
    {
        parent::__construct($model);
    }


}