<?php


namespace App\Services\Implementation;


class MainService
{

    protected $tableRepository;
    protected $floorRepository;
    protected $orderRepository;
    protected $menuRepository;
    protected $orderDetailRepository;
    protected $productRepository;
    protected $discountRepository;
    protected $errorRepository;
    protected $workShiftRepository;
    protected $userRepository;
    protected $roleRepository;
    protected $subcatRepository;
    protected $genRepRepository;
    protected $waiterRepRepository;

    public function __construct()
    {
        $this->tableRepository = resolve('App\Repository\TableRepository');
        $this->floorRepository = resolve('App\Repository\FloorRepository');
        $this->orderRepository = resolve('App\Repository\OrderRepository');
        $this->menuRepository = resolve('App\Repository\MenuRepository');
        $this->orderDetailRepository = resolve('App\Repository\OrderDetailRepository');
        $this->productRepository = resolve('App\Repository\ProductRepository');
        $this->discountRepository = resolve('App\Repository\DiscountRepository');
        $this->errorRepository = resolve('App\Repository\ErrorRepository');
        $this->workShiftRepository = resolve('App\Repository\WorkShiftRepository');
        $this->userRepository = resolve('App\Repository\UserRepository');
        $this->roleRepository = resolve('App\Repository\RoleRepository');
        $this->subcatRepository = resolve('App\Repository\SubCategoryRepository');
        $this->genRepRepository = resolve('App\Repository\GeneralReportRepository');
        $this->waiterRepRepository = resolve('App\Repository\WaiterReportRepository');
    }


}