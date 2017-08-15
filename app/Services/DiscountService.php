<?php


namespace App\Services;


interface DiscountService
{

    public function getAllDiscounts();

    public function setDiscountToOrder($id, $discountId);

    public function disableDiscount($id);

}