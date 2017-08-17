<?php


namespace App\Services;


interface OrderDetailService
{

    public function addOrderDetail($request, $id);

    public function deleteOrderDetail($request);

}