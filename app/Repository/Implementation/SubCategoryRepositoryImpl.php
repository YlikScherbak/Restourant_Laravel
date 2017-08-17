<?php


namespace App\Repository\Implementation;


use App\Model\SubCategories;
use App\Repository\SubCategoryRepository;


class SubCategoryRepositoryImpl extends MainRepository implements SubCategoryRepository
{
    public function __construct(SubCategories $model)
    {
        parent::__construct($model);
    }

    public function getWithProducts()
    {
        return $this->model->with('products')->get();
    }


}