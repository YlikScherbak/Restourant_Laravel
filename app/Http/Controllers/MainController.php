<?php

namespace App\Http\Controllers;

use Cache;
use Illuminate\Http\Request;
use Log;

class MainController extends Controller
{

    protected $title = 'Wow i forget add title(';

    protected $template;

    protected $navbar;

    protected $vars = [];

    protected $tableService;
    protected $orderService;
    protected $menuService;
    protected $discountService;
    protected $orderDetService;
    protected $errorService;
    protected $workShiftService;
    protected $userService;
    protected $productService;
    protected $reportService;



    protected function addVars($alias, $value) {
        $this->vars = array_add($this->vars, $alias, $value);
    }

    protected function getWaiterNavbar(){

        if (Cache::has('waiter_navbar')){
            return Cache::get('waiter_navbar');
        } else {
            $navbar =  view('waiter.waiter_navbar')->render();
            Cache::put('waiter_navbar', $navbar);
            return $navbar;
        }
    }

    protected function getAdminNavbar(){

        if (Cache::has('admin_navbar')){
            return Cache::get('admin_navbar');
        } else {
            $navbar =  view('admin.admin_navbar')->render();
            Cache::put('admin_navbar', $navbar);
            return $navbar;
        }

    }

    protected function renderOutput()
    {
        $this->addVars('navbar', $this->navbar);

        if (view()->exists($this->template)) {
            return view($this->template, $this->vars)->with('title', $this->title);
        } else {
            Log::alert('Template ' . $this->template . ' does not exists.');
            abort(500, 'Template ' . $this->template . ' does not exists');
        }
    }
}
