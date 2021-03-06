<?php


namespace App\Services\Implementation;


use App\Model\Error;
use App\Services\ErrorService;
use Auth;
use Carbon\Carbon;


class ErrorServiceImpl extends MainService implements ErrorService
{

    public function saveError($request, $id)
    {

        $user = Auth::user();
        $error = new Error(['date' => Carbon::now(), 'waiter' => $user->username, 'message' => $request->get('text'),
            'order_id' => $id]);

        $this->errorRepository->save($error);
    }

    public function getActiveError()
    {
        return $this->errorRepository->count();
    }

    public function getAll()
    {
        return $this->errorRepository->findAll();
    }

    public function deleteById($id)
    {
        $this->errorRepository->delete($id);
    }


}