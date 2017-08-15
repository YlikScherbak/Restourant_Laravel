<?php


namespace App\Repository\Implementation;

use \App\Repository\MainRepository as Repository;
use App\Model\Order;


class OrderRepositoryImpl extends MainRepository implements Repository
{

    public function __construct(Order $model)
    {
        parent::__construct($model);
    }


    public function findById($id, $details = true)
    {
        $order = parent::findById($id);
        if ($order && $details == true) {
            $order->load('details');
        }
        return $order;
    }

    public function selectWhere($conditions = [])
    {
        return $this->model->where($conditions)->get();
    }


}