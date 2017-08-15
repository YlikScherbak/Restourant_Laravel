<?php

namespace App\Http\Controllers\Waiter;

use App\Http\Controllers\MainController;
use App\Services\MenuService;
use Auth;
use Gate;
use Illuminate\Http\Request;


class MenuController extends MainController
{
    public function __construct(MenuService $menuService)
    {
        $this->title = 'Menu';
        $this->template = 'waiter.menu';
        $this->menuService = $menuService;
    }


    public function showMenu(Request $request, $id)
    {


        if ($request->exists('compliment')){
            $this->addVars('compliment', true);
        } else {
            $this->addVars('compliment', false);
        }
        $this->addVars('menu', $this->menuService->getMenu());
        $this->addVars('orderId', $id);

        return $this->renderOutput();
    }
}
