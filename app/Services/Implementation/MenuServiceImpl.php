<?php


namespace App\Services\Implementation;


use App\Model\MenuCategories;
use App\Model\SubCategories;
use App\Services\MenuService;

class MenuServiceImpl extends MainService implements MenuService
{

    public function getMenu()
    {
        return $this->menuRepository->getMenu();
    }

    public function saveNewMain($request)
    {
        $data = $request->get('category');
        $menuCategory = new MenuCategories(['category' => $data]);
        $this->menuRepository->save($menuCategory);
    }

    public function getAllMain()
    {
        return $this->menuRepository->findAll();
    }

    public function getMainById($id)
    {
        return $this->menuRepository->findById($id);
    }

    public function editMain($request, $id)
    {
        $category = $request->get('category');
        $main = $this->menuRepository->findById($id);
        $main->category = $category;
        $this->menuRepository->save($main);
    }

    public function deleteMain($id)
    {
        $this->menuRepository->delete($id);
    }


    public function saveNewSub($request)
    {
        $data = $request->only('subcategory', 'mainCategory');
        $mainCat = $this->menuRepository->findById($data['mainCategory']);

        $subCat = new SubCategories(['sub_category' => $data['subcategory']]);
        $subCat->category()->associate($mainCat);

        $this->subcatRepository->save($subCat);
    }

    public function getAllSubCat()
    {
        return $this->subcatRepository->findAll();
    }

    public function getSubById($id)
    {
        return $this->subcatRepository->findById($id);
    }

    public function editSub($request, $id)
    {
        $data = $request->only('subcategory', 'mainCategory');
        $mainCat = $this->menuRepository->findById($data['mainCategory']);

        $subCat = $this->subcatRepository->findById($id);
        $subCat->sub_category = $data['subcategory'];
        $subCat->category()->associate($mainCat);

        $this->subcatRepository->save($subCat);
    }

    public function deleteSub($id)
    {
        $this->subcatRepository->delete($id);
    }

    public function getSubWithProducts()
    {
        return $this->subcatRepository->getWithProducts();
    }


}