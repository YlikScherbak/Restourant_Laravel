<?php

namespace App\Providers;

use App\Services\Implementation\DiscountServiceImpl;
use App\Services\Implementation\ErrorServiceImpl;
use App\Services\Implementation\MenuServiceImpl;
use App\Services\Implementation\OrderDetailServiceImpl;
use App\Services\Implementation\OrderServiceImpl;
use App\Services\Implementation\ProductServiceImpl;
use App\Services\Implementation\ReportServiceImpl;
use App\Services\Implementation\TableServiceImpl;
use App\Services\Implementation\UserServiceImpl;
use App\Services\Implementation\WorkShiftServiceImpl;
use Illuminate\Support\ServiceProvider;

class MainServicesProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }


    public function register()
    {
        $this->app->bind('App\Services\TableService', function () {
            return new TableServiceImpl();
        });

        $this->app->bind('App\Services\OrderService', function () {
            return new OrderServiceImpl();
        });

        $this->app->bind('App\Services\OrderDetailService', function () {
            return new OrderDetailServiceImpl();
        });

        $this->app->bind('App\Services\MenuService', function () {
            return new MenuServiceImpl();
        });

        $this->app->bind('App\Services\DiscountService', function () {
            return new DiscountServiceImpl();
        });

        $this->app->bind('App\Services\ErrorService', function () {
            return new ErrorServiceImpl();
        });

        $this->app->bind('App\Services\WorkShiftService', function () {
            return new WorkShiftServiceImpl();
        });

        $this->app->bind('App\Services\UserService', function () {
            return new UserServiceImpl();
        });

        $this->app->bind('App\Services\ProductService', function () {
            return new ProductServiceImpl();
        });

        $this->app->bind('App\Services\ReportService', function () {
            return new ReportServiceImpl();
        });

    }
}
