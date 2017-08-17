<?php


namespace App\Services;


interface ErrorService
{

    public function saveError($request, $id);

    public function getActiveError();

    public function getAll();

    public function deleteById($id);

}