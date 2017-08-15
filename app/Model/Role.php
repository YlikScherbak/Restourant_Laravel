<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'roles';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = true;

    protected $casts = [
        'role' => 'string',
    ];

    protected $fillable = ['id', 'role', 'created_at', 'updated_at'];


}
