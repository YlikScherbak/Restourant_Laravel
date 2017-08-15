<?php

namespace App\Policies;

use App\Model\Table;
use Illuminate\Auth\Access\HandlesAuthorization;

class TablePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function canCreateOrder(Table $table){
        return $table->occupied;
    }
}
