<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetailAudition extends Model
{
    protected $table = 'order_detail_auditions';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'waiter_name', 'order_id', 'product_name', 'count', 'date'
    ];

}
