<?php


namespace App\Services\Implementation;


use App\Services\OrderService;
use App\Model\Order;
use Auth;
use Carbon\Carbon;
use DB;
use Gate;
use Log;


class OrderServiceImpl extends MainService implements OrderService
{


    public function createOrder($id)
    {
        $user = Auth::user();

        $table = $this->tableRepository->findById($id);

        if (is_null($table)) {
            Log::alert('User ' . $user->username . ' trying to get not existing table');
            abort(500, 'Table ' . $id . ' is not exists');
        }

        if (Gate::allows('canCrateOrder', $table)) {
            Log::alert('User ' . $user->username . ' was tried to access someone else\'s order');
            abort(403, 'You can not create a new order, as the table is already in use');
        }

        $workShift = $this->workShiftRepository->selectWhere([['active', '=', true]]);

        $orderId = false;
        try {
            DB::beginTransaction();
            $order = new Order(['active' => true, 'total_amount' => 0.0, 'discount_amount' => 0.0, 'creation_date' => Carbon::now()]);
            $table->user()->associate($user);
            $order->user()->associate($user);
            $order->workShift()->associate($workShift);
            $orderId = ($this->orderRepository->save($order))->id;
            $table->order()->associate($order);
            $table->occupied = true;
            $this->tableRepository->save($table);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Transaction exception in OrderService@createOrder. User:' . $user->name . ' at' . Carbon::now());
            abort(500, "Transaction exception");
        }

        return $orderId;
    }

    public function getOrderById($id)
    {
        $order = $this->orderRepository->findById($id);
        $user = Auth::user();

        if (!$order) {
            Log::alert('User ' . $user->username . ' trying to get not existing order');
            abort(500, 'Order ' . $id . ' is not exists');
        }

        return $order;
    }

    public function getActiveWaiterOrder()
    {
        $user = Auth::user();

        $orders = $this->orderRepository->selectWhere([
            ['user_id', '=', $user->id],
            ['active', '=', true]]);

        return $orders;
    }

    public function closeOrder($id)
    {
        $order = $this->orderRepository->findById($id);
        $user = Auth::user();

        if (!$order) {
            Log::alert('User ' . $user->username . ' trying to get not existing order');
            abort(500, 'Order ' . $id . ' is not exists');
        }

        $order->active = false;
        $order->table->occupied = false;
        $order->table->user()->dissociate();
        $order->table->order()->dissociate();
        $order->closed_date = Carbon::now();
        $this->orderRepository->save($order);
        $this->tableRepository->save($order->table);

        return $order;
    }

    public function getAllOrderPaginate($active)
    {
        if ($active){
            return $this->orderRepository->getAllActiveOrderPaginate();
        }
        return $this->orderRepository->getAllOrderPaginate();
    }


}