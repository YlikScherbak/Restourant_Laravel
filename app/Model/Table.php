<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'tables';

    protected $primaryKey = 'id';
    public $incrementing = false;

    public $timestamps = true;

    protected $casts = [
        'id' => 'integer',
        'occupied' => 'bool'
    ];

    protected $fillable = [
        'id', 'occupied', 'user_id', 'order_id', 'floor_id', 'updated_at', 'created_at'
    ];

    protected $with = ['user'];

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

    public function order() {
        return $this->belongsTo('App\Model\Order');
    }

}
