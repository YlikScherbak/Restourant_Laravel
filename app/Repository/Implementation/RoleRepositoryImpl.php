<?php


namespace App\Repository\Implementation;

use App\Model\Role;
use App\Repository\RoleRepository;

class RoleRepositoryImpl extends MainRepository implements RoleRepository
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }


}