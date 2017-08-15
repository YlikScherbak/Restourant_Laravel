<?php


namespace App\Repository\Implementation;


use App\Model\MenuCategories;
use App\Repository\MenuRepository;

class MenuRepositoryImpl extends MainRepository implements MenuRepository
{

    public function __construct(MenuCategories $model)
    {
        parent::__construct($model);
    }


    public function getMenu()
    {
        return $this->model->with('subCategories.products')->get();
    }
}