<?php


namespace App\Repository\Implementation;


use App\Model\MenuCategories;
use App\Repository\MenuRepository;
use DB;

class MenuRepositoryImpl extends MainRepository implements MenuRepository
{

    public function __construct(MenuCategories $model)
    {
        parent::__construct($model);
    }


    public function getMenu()
    {

//        $result = DB::table('menu_categories')
//            ->join('sub_categories', 'menu_categories.id','sub_categories.category_id')
//            ->join('products', 'sub_categories.id', 'products.subcategory_id')
//        ->select('menu_categories.category', 'sub_categories.sub_category', 'products.prod_name', 'products.price')
//        ->get();

        return $this->model->with('subCategories.products')->get();
    }
}