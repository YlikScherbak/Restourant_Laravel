<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MainController;
use App\Http\Requests\MainCategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\SubCategoryRequest;
use App\Services\MenuService;
use App\Services\ProductService;
use Illuminate\Http\Request;


class AdminMenuController extends MainController
{
    public function __construct(MenuService $menuService, ProductService $productService)
    {
        $this->menuService = $menuService;
        $this->productService = $productService;
    }


    public function addMain(MainCategoryRequest $request)
    {

        if ($request->isMethod('post')) {
            $this->menuService->saveNewMain($request);
            return redirect(route('admin_main'))->with('message', 'Main category added to menu');
        }

        $this->title = 'Add Main category';
        $this->template = 'admin.menu.main_cat';

        return $this->renderOutput();

    }

    public function addSub(SubCategoryRequest $request)
    {

        if ($request->isMethod('post')) {
            $this->menuService->saveNewSub($request);
            return redirect(route('admin_main'))->with('message', 'Sub category added to menu');
        }


        $this->addVars('main', $this->menuService->getAllMain());
        $this->title = 'Add Main category';
        $this->template = 'admin.menu.sub_cat';

        return $this->renderOutput();
    }

    public function addProduct(ProductRequest $request)
    {

        if ($request->isMethod('post')) {
            $this->productService->saveNewProduct($request);
            return redirect(route('admin_main'))->with('message', 'Product added to menu');
        }

        $this->addVars('subcategories', $this->menuService->getAllSubCat());
        $this->template = 'admin.menu.product';
        $this->title = 'Add Subcategory';

        return $this->renderOutput();
    }

    public function allMain()
    {
        $this->title = 'All main categories';
        $this->template = 'admin.menu.all_main';

        $this->addVars('mains', $this->menuService->getAllMain());

        return $this->renderOutput();
    }

    public function editMain(MainCategoryRequest $request, $id)
    {

        if ($request->isMethod('post')) {
            $this->menuService->editMain($request, $id);
            return redirect(route('menu_all_main'))->with('message', 'Main category is changed');
        }

        $this->title = 'Edit Main category';
        $this->template = 'admin.menu.main_cat';

        $this->addVars('main', $this->menuService->getMainById($id));

        return $this->renderOutput();

    }

    public function deleteMain(Request $request)
    {
        $this->menuService->deleteMain($request->get('id'));
        return redirect(route('menu_all_main'))->with('message', 'Main category is deleted');
    }


    public function allSub()
    {
        $this->title = 'All main categories';
        $this->template = 'admin.menu.all_sub';

        $this->addVars('subcategories', $this->menuService->getAllSubCat());

        return $this->renderOutput();
    }

    public function editSub(SubCategoryRequest $request, $id)
    {

        if ($request->isMethod('post')) {
            $this->menuService->editSub($request, $id);
            return redirect(route('menu_all_sub'))->with('message', 'Subcategory is changed');
        }

        $this->title = 'Edit Subcategory';
        $this->template = 'admin.menu.sub_cat';

        $this->addVars('subcategory', $this->menuService->getSubById($id));
        $this->addVars('main', $this->menuService->getAllMain());

        return $this->renderOutput();
    }

    public function deleteSub(Request $request)
    {
        $this->menuService->deleteSub($request->get('id'));
        return redirect(route('menu_all_main'))->with('message', 'Subcategory is deleted');
    }

    public function allProduct()
    {
        $this->title = 'All products';
        $this->template = 'admin.menu.all_product';

        $this->addVars('subcategories', $this->menuService->getSubWithProducts());

        return $this->renderOutput();
    }

    public function editProduct(ProductRequest $request, $id)
    {
        if ($request->isMethod('post')) {
            $this->productService->edit($request, $id);
            return redirect(route('menu_all_prod'))->with('message', 'Product is changed');
        }


        $this->title = 'Edit Product';
        $this->template = 'admin.menu.product';

        $this->addVars('subcategories', $this->menuService->getAllSubCat());
        $this->addVars('product', $this->productService->getById($id));

        return $this->renderOutput();
    }

    public function deleteProduct(Request $request) {

    }


}
