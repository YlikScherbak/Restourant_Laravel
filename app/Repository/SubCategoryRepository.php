<?php


namespace App\Repository;


interface SubCategoryRepository extends MainRepository
{

    public function getWithProducts();

}