<?php

namespace App\Http\Controllers\Waiter;

use App\Model\OrderDetails;
use App\Model\User;
use App\Services\OrderService;
use App\Services\TableService;
use Auth;
use DB;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\MainController;


class TableController extends MainController
{

    public function __construct(TableService $tableService, OrderService $orderService)
    {
        $this->template = 'waiter.tables';
        $this->title = 'Tables';
        $this->tableService = $tableService;
        $this->orderService = $orderService;
    }


    public function show()
    {
        $this->addVars('floors', $this->tableService->getAllTable());
        return $this->renderOutput();
    }


    public function create($id)
    {
        $id = $this->orderService->createOrder($id);

        return redirect()->route('waiter_order', ['id' => $id]);

    }


}
