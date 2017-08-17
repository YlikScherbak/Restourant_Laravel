<?php


namespace App\Services;


interface ProductService
{

    public function saveNewProduct($request);

    public function getAllProd();

    public function getById($id);

    public function edit($request, $id);

    public function delete($id);

}