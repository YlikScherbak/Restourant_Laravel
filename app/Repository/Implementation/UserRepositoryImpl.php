<?php


namespace App\Repository\Implementation;


use App\Model\User;
use App\Repository\UserRepository;

class UserRepositoryImpl extends MainRepository implements UserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getAllWaiter()
    {
        return $this->model->whereHas('role', function ($query) {
            $query->where('role', '=', 'waiter');
        })->get();
    }


}