<?php

namespace App\Providers;

use App\Model\Discount;
use App\Model\Error;
use App\Model\Floor;
use App\Model\MenuCategories;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Product;
use App\Model\Table;
use App\Model\WorkShift;
use App\Repository\Implementation\DiscountRepositoryImpl;
use App\Repository\Implementation\ErrorRepositoryImpl;
use App\Repository\Implementation\FloorRepositoryImpl;
use App\Repository\Implementation\MenuRepositoryImpl;
use App\Repository\Implementation\OrderDetailRepositoryImpl;
use App\Repository\Implementation\OrderRepositoryImpl;
use App\Repository\Implementation\ProductRepositoryImpl;
use App\Repository\Implementation\TableRepositoryImpl;
use App\Repository\Implementation\WorkShiftRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class MainRepositoryProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }


    public function register()
    {
        $this->app->bind('App\Repository\DiscountRepository', function () {
            return new DiscountRepositoryImpl(new Discount());
        });

        $this->app->bind('App\Repository\FloorRepository', function () {
            return new FloorRepositoryImpl(new Floor());
        });

        $this->app->bind('App\Repository\MenuRepository', function () {
            return new MenuRepositoryImpl(new MenuCategories());
        });

        $this->app->bind('App\Repository\OrderDetailRepository', function () {
            return new OrderDetailRepositoryImpl(new OrderDetails());
        });

        $this->app->bind('App\Repository\TableRepository', function () {
            return new TableRepositoryImpl(new Table());
        });

        $this->app->bind('App\Repository\OrderRepository', function () {
            return new OrderRepositoryImpl(new Order());
        });

        $this->app->bind('App\Repository\ProductRepository', function () {
            return new ProductRepositoryImpl(new Product());
        });

        $this->app->bind('App\Repository\ErrorRepository', function () {
            return new ErrorRepositoryImpl(new Error());
        });

        $this->app->bind('App\Repository\WorkShiftRepository', function () {
            return new WorkShiftRepositoryImpl(new WorkShift());
        });
    }
}
