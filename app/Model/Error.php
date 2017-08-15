<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    protected $table = 'errors';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['message', 'waiter', 'order_id', 'date'];

}
