<?php

namespace App\Listeners;

use App\Events\AddOrderDetails;
use App\Model\OrderDetailAudition;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderDetailEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AddOrderDetails  $event
     * @return void
     */
    public function handle(AddOrderDetails $event)
    {
        $od = $event->orderDetails;
       $detailaudition = new OrderDetailAudition(['waiter_name' => \Auth::user()->username,
           'order_id' => $od->order->id, 'product_name' => $od->product_name, 'count' => $od->count, 'date' => Carbon::now()]);
       $detailaudition->save();
    }


}
