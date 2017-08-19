<?php

namespace App\Providers;

use App\Model\Discount;
use App\Model\Error;
use App\Model\Floor;
use App\Model\GeneralReport;
use App\Model\MenuCategories;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Product;
use App\Model\Role;
use App\Model\SubCategories;
use App\Model\Table;
use App\Model\User;
use App\Model\WaiterReport;
use App\Model\WorkShift;
use App\Repository\Implementation\DiscountRepositoryImpl;
use App\Repository\Implementation\ErrorRepositoryImpl;
use App\Repository\Implementation\FloorRepositoryImpl;
use App\Repository\Implementation\GeneralReportRepositoryImpl;
use App\Repository\Implementation\MenuRepositoryImpl;
use App\Repository\Implementation\OrderDetailRepositoryImpl;
use App\Repository\Implementation\OrderRepositoryImpl;
use App\Repository\Implementation\ProductRepositoryImpl;
use App\Repository\Implementation\RoleRepositoryImpl;
use App\Repository\Implementation\SubCategoryRepositoryImpl;
use App\Repository\Implementation\TableRepositoryImpl;
use App\Repository\Implementation\UserRepositoryImpl;
use App\Repository\Implementation\WaiterReportRepositoryImpl;
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
        $this->app->singleton('App\Repository\DiscountRepository', function () {
            return new DiscountRepositoryImpl(new Discount());
        });

        $this->app->singleton('App\Repository\FloorRepository', function () {
            return new FloorRepositoryImpl(new Floor());
        });

        $this->app->singleton('App\Repository\MenuRepository', function () {
            return new MenuRepositoryImpl(new MenuCategories());
        });

        $this->app->singleton('App\Repository\OrderDetailRepository', function () {
            return new OrderDetailRepositoryImpl(new OrderDetails());
        });

        $this->app->singleton('App\Repository\TableRepository', function () {
            return new TableRepositoryImpl(new Table());
        });

        $this->app->singleton('App\Repository\OrderRepository', function () {
            return new OrderRepositoryImpl(new Order());
        });

        $this->app->singleton('App\Repository\ProductRepository', function () {
            return new ProductRepositoryImpl(new Product());
        });

        $this->app->singleton('App\Repository\ErrorRepository', function () {
            return new ErrorRepositoryImpl(new Error());
        });

        $this->app->singleton('App\Repository\WorkShiftRepository', function () {
            return new WorkShiftRepositoryImpl(new WorkShift());
        });

        $this->app->singleton('App\Repository\UserRepository', function () {
            return new UserRepositoryImpl(new User());
        });

        $this->app->singleton('App\Repository\RoleRepository', function () {
            return new RoleRepositoryImpl(new Role());
        });

        $this->app->singleton('App\Repository\SubCategoryRepository', function () {
            return new SubCategoryRepositoryImpl(new SubCategories());
        });

        $this->app->singleton('App\Repository\GeneralReportRepository', function () {
            return new GeneralReportRepositoryImpl(new GeneralReport());
        });

        $this->app->singleton('App\Repository\WaiterReportRepository', function () {
            return new WaiterReportRepositoryImpl(new WaiterReport());
        });
    }
}
