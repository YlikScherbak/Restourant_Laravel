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
        $this->app->singleton('App\Services\TableService', function () {
            return new TableServiceImpl();
        });

        $this->app->singleton('App\Services\OrderService', function () {
            return new OrderServiceImpl();
        });

        $this->app->singleton('App\Services\OrderDetailService', function () {
            return new OrderDetailServiceImpl();
        });

        $this->app->singleton('App\Services\MenuService', function () {
            return new MenuServiceImpl();
        });

        $this->app->singleton('App\Services\DiscountService', function () {
            return new DiscountServiceImpl();
        });

        $this->app->singleton('App\Services\ErrorService', function () {
            return new ErrorServiceImpl();
        });

        $this->app->singleton('App\Services\WorkShiftService', function () {
            return new WorkShiftServiceImpl();
        });

        $this->app->singleton('App\Services\UserService', function () {
            return new UserServiceImpl();
        });

        $this->app->singleton('App\Services\ProductService', function () {
            return new ProductServiceImpl();
        });

        $this->app->singleton('App\Services\ReportService', function () {
            return new ReportServiceImpl();
        });

    }
}
