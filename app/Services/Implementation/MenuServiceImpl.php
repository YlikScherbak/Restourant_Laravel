<?php


namespace App\Services\Implementation;


use App\Services\MenuService;

class MenuServiceImpl extends MainService implements MenuService
{



    public function getMenu()
    {
        return $this->menuRepository->getMenu();
    }


}