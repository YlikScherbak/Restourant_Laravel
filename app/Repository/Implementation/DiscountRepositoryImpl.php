<?php


namespace App\Repository\Implementation;


use App\Model\Discount;
use App\Repository\DiscountRepository;
use Illuminate\Database\Eloquent\Model;

class DiscountRepositoryImpl extends MainRepository implements DiscountRepository
{

    public function __construct(Discount $model)
    {
        parent::__construct($model);
    }


}