<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use App\Services\OrderDetailService;
use App\Services\OrderService;
use Illuminate\Http\Request;


class AdminOrderController extends MainController
{

    public function __construct(OrderService $orderService, OrderDetailService $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetService = $orderDetailService;
    }

    public function allOrders($active = false) {
        $this->title = 'All orders';
        $this->template = 'admin.orders.all_orders';

        $this->addVars('orders', $this->orderService->getAllOrderPaginate($active));

        return $this->renderOutput();
    }


    public function editOrder($id) {

        $this->title = 'Order edit';
        $this->template = 'admin.orders.order_edit';

        $this->addVars('order', $this->orderService->getOrderById($id));

        return $this->renderOutput();
    }

    public function deleteProduct(Request $request){
        $this->orderDetService->deleteOrderDetail($request);

        return redirect(route('edit_order', ['id' => $request->get('id')]));
    }

    public function searchOrder(Request $request) {
         return $this->editOrder($request->get('id'));
    }



}
