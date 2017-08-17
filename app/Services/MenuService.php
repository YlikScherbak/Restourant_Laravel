<?php


namespace App\Services;


interface MenuService
{

    public function getMenu();

    public function saveNewMain($request);

    public function getAllMain();

    public function getMainById($id);

    public function editMain($request, $id);

    public function deleteMain($id);

    public function saveNewSub($request);

    public function getAllSubCat();

    public function getSubById($id);

    public function editSub($request, $id);

    public function deleteSub($id);

    public function getSubWithProducts();

}