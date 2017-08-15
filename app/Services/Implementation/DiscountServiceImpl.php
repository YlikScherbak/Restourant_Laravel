<?php


namespace App\Services\Implementation;


use App\Services\DiscountService;
use Auth;
use Log;

class DiscountServiceImpl extends MainService implements DiscountService
{


    public function getAllDiscounts()
    {
        return $this->discountRepository->findAll();
    }

    public function setDiscountToOrder($id, $discountId)
    {
        $user = Auth::user();

        $order = $this->orderRepository->findById($id, false);
        if (is_null($order)) {
            Log::alert('User ' . $user->username . ' trying to get not existing order');
            abort(500, 'Such order does not exist');
        }

        $discount = $this->discountRepository->findById($discountId);
        if (is_null($discount)) {
            abort(500, 'Such discount does not exist');
        }

        if ($order->discount) {
            $order->total_amount = $order->total_amount + $order->discount_amount;
        }

        $order->discount()->associate($discount);
        $order->recount();

        $this->orderRepository->save($order);
    }

    public function disableDiscount($id) {
        $user = Auth::user();

        $order = $this->orderRepository->findById($id, false);
        if (is_null($order)) {
            Log::alert('User ' . $user->username . ' trying to get not existing order');
            abort(500, 'Such order does not exist');
        }


        $order->discount()->dissociate();
        $order->total_amount = $order->total_amount + $order->discount_amount;
        $order->discount_amount = 0.0;

        $this->orderRepository->save($order);
    }


}