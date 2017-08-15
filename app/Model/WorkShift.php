<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WorkShift extends Model
{
    protected $table = 'work_shifts';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'active', 'creation_date', 'closed_date',
    ];

    public function orders() {
        return $this->hasMany('App/Model/Order', 'work_shift_id', 'id');
    }
}
