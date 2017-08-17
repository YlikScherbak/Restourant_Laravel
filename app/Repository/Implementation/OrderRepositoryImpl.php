<?php


namespace App\Repository\Implementation;

use App\Model\Order;
use App\Repository\OrderRepository;
use DB;


class OrderRepositoryImpl extends MainRepository implements OrderRepository
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

    public function getAllOrderPaginate()
    {
        return $this->model->paginate(15);
    }

    public function getAllActiveOrderPaginate()
    {
        return $this->model->where([['active' , '=', true]])->paginate(15);

    }

    public function getReportInfo($id)
    {
        return DB::select("SELECT user_id, SUM(total_amount) as total_amount, SUM(discount_amount )as discount_amount FROM Orders  WHERE work_shift_id = ? GROUP BY user_id", [$id]);
    }


}