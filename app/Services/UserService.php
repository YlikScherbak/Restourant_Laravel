<?php


namespace App\Services;
use Illuminate\Http\Request;


interface UserService
{

    public function getAllWaiters();

    public function enabledWaiter(Request $request);

    public function getWaiterById($id);

    public function saveWaiter($request, $id);

    public function registryWaiter($request);

}