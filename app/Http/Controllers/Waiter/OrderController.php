<?php

namespace App\Http\Controllers\Waiter;

use App\Http\Controllers\MainController;
use App\Services\DiscountService;
use App\Services\ErrorService;
use App\Services\OrderDetailService;
use App\Services\OrderService;
use Illuminate\Http\Request;


class OrderController extends MainController
{
    public function __construct(OrderService $orderService, DiscountService $discountService, OrderDetailService $orderDetailService,
                                ErrorService $errorService)
    {
        $this->orderService = $orderService;
        $this->discountService = $discountService;
        $this->orderDetService = $orderDetailService;
        $this->errorService = $errorService;
    }


    public function showOrder($id)
    {
        $this->title = 'Order';
        $this->template = 'waiter.order';

        $this->addVars('order', $this->orderService->getOrderById($id));
        $this->addVars('discounts', $this->discountService->getAllDiscounts());

        return $this->renderOutput();

    }


    public function allOrders()
    {
        $this->title = 'All orders';
        $this->template = 'waiter.orders';

        $this->addVars('orders', $this->orderService->getActiveWaiterOrder());

        return $this->renderOutput();
    }


    public function addProduct(Request $request, $id)
    {
        $product = $this->orderDetService->addOrderDetail($request, $id);

        return response($product, 200);
    }


    public function setDiscount($id, $discount)
    {
        $this->discountService->setDiscountToOrder($id, $discount);

        return redirect()->route('waiter_order', ['id' => $id]);
    }


    public function disableDiscount($id)
    {
        $this->discountService->disableDiscount($id);

        return redirect()->route('waiter_order', ['id' => $id]);
    }


    public function closeOrder($id)
    {
        $this->title = 'Check';
        $this->template = 'waiter.check';
        $this->addVars('order', $this->orderService->closeOrder($id));

        return $this->renderOutput();
    }


    public function sendError(Request $request, $id)
    {
        $this->errorService->saveError($request, $id);
    }

}
