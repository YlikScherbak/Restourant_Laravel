<?php


namespace App\Repository\Implementation;


use App\Model\OrderDetails;
use App\Repository\OrderDetailRepository;

class OrderDetailRepositoryImpl extends MainRepository implements OrderDetailRepository
{

    public function __construct(OrderDetails $model)
    {
        parent::__construct($model);
    }

    public function delete($model)
    {
        $model->delete();
    }


}