<?php


namespace App\Services;


interface OrderService
{

    public function createOrder($id);

    public function getOrderById($id);

    public function getActiveWaiterOrder();

    public function closeOrder($id);

    public function getAllOrderPaginate($active);

}