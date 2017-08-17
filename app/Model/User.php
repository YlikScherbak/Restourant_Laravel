<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = true;

    protected $casts = [
        'username' => 'string',
        'enabled' => 'bool'
    ];

    protected $fillable = [
        'username', 'password', 'enabled', 'role_id', 'updated_at', 'created_at',
    ];

    protected $hidden = ['remember_token',];

    protected $with = ['role'];


    public function role() {
        return $this->belongsTo('App\Model\Role', 'role_id', 'id');
    }

    public function orders() {
        return $this->hasMany('App\Model\Order');
    }
}
