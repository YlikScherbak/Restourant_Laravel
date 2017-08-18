<?php


namespace App\Services\Implementation;

use App\Events\AddOrderDetails;
use App\Model\OrderDetails;
use App\Services\OrderDetailService;
use Auth;
use Carbon\Carbon;
use Log;
use Illuminate\Http\Request;


class OrderDetailServiceImpl extends MainService implements OrderDetailService
{


    public function addOrderDetail($request, $id)
    {
        $user = Auth::user();
        $data = $request->except('_token');

        $order = $this->orderRepository->findById($id);
        if (is_null($order)) {
            Log::alert('User ' . $user->username . ' trying to get not existing order');
            abort(500, 'Such order does not exist');
        }

        $product = $this->productRepository->selectWhere([['prod_name', '=', $data['product']]]);
        if (is_null($product)) {
            Log::alert('User ' . $user->username . ' trying to add not existing product to order');
            abort(500, 'Such product does not exist');
        }

        $orderDetail = $this->orderDetailRepository->selectWhere(
            [
                ['order_id', '=', $id],
                ['product_name', '=', ($data['compliment']) ? ($product->prod_name . ' compliment') : $product->prod_name],
            ]);

        if (is_null($orderDetail)) {
            $orderDetail = new OrderDetails(['count' => 1, 'date' => Carbon::now(),
                'category' => $product->subCategory->sub_category,
                'product_name' => ($data['compliment']) ? ($product->prod_name . ' compliment') : $product->prod_name]);
            $orderDetail->price = ($data['compliment']) ? 0.0 : $product->price;
            $orderDetail->order()->associate($order);
        } else {
            $orderDetail->count = $orderDetail->count + 1;
        }

        if ($order->discount) {
            $order->setAmountWithDiscount($orderDetail->price);
        } else {
            $order->total_amount = $order->total_amount + $orderDetail->price;
        }

        event(new AddOrderDetails($orderDetail));
        $this->orderDetailRepository->save($orderDetail);
        $this->orderRepository->save($order);

        return $orderDetail->product_name;
    }

    public function deleteOrderDetail($request)
    {
        $data = $request->only('id', 'product_name');

        $order = $this->orderRepository->findById($data['id']);

        
        if ($order->active == false) {
            return redirect(route('edit_order', ['id' => $request->get('id')]))->with('message', 'You cant edit closed order');
        }

        $orderDetail = $this->orderDetailRepository->selectWhere(
            [
                ['order_id', '=', $data['id']],
                ['product_name', '=', $data['product_name']],
            ]);


        if (!is_null($order->discount)) {
            $order->setAmountWhenDelete($orderDetail->count * $orderDetail->price);
        } else {
            $order->total_amount = $order->total_amount - ($orderDetail->count * $orderDetail->price);
        }

        $this->orderDetailRepository->delete($orderDetail);
        $this->orderRepository->save($order);
    }


}