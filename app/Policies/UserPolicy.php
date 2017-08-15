<?php

namespace App\Policies;

use App\Model\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
    }

    public function isWaiter(User $user){
        return ($user->role->role === 'waiter') ? true : false;
    }
}
