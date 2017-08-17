<?php


namespace App\Services\Implementation;


use App\Model\Product;
use App\Services\ProductService;

class ProductServiceImpl extends MainService implements ProductService
{


    public function saveNewProduct($request)
    {
        $data = $request->only('subcategory', 'prod_name', 'price');

        $subcat = $this->subcatRepository->findById($data['subcategory']);

        $product = new Product(['prod_name' => $data['prod_name'], 'price' => $data['price']]);
        $product->subCategory()->associate($subcat);

        $this->productRepository->save($product);
    }

    public function getAllProd()
    {
        return $this->productRepository->findAll();
    }

    public function getById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function edit($request, $id)
    {
        $data = $request->only('subcategory', 'prod_name', 'price');

        $subcat = $this->subcatRepository->findById($data['subcategory']);
        $product = $this->getById($id);
        $product->prod_name = $data['prod_name'];
        $product->price = $data['price'];
        $product->subCategory()->associate($subcat);

        $this->productRepository->save($product);

    }

    public function delete($id)
    {
        $this->productRepository->delete($id);
    }


}