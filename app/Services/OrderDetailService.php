<?php


namespace App\Services;


use Request;

interface OrderDetailService
{

    public function addOrderDetail($request, $id);

}