<?php


namespace App\Repository;


interface OrderRepository extends MainRepository
{

    public function getAllOrderPaginate();

    public function getAllActiveOrderPaginate();

    public function getReportInfo($id);

}