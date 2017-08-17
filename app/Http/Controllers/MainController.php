<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class MainController extends Controller
{

    protected $title = 'Wow i forget add title(';

    protected $template;

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



    protected function addVars($alias, $value) {
        $this->vars = array_add($this->vars, $alias, $value);
    }

    protected function renderOutput()
    {
        if (view()->exists($this->template)) {
            return view($this->template, $this->vars)->with('title', $this->title);
        } else {
            Log::alert('Template ' . $this->template . ' does not exists.');
            abort(500, 'Template ' . $this->template . ' does not exists');
        }
    }
}
