<?php


namespace App\Repository\Implementation;


use App\Model\Product;
use App\Repository\ProductRepository;


class ProductRepositoryImpl extends MainRepository implements ProductRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

}