<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $table = 'floors';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = true;

    protected $casts = [
        'floor_name' => 'string',
    ];

    protected $fillable = ['floor_name', 'created_at', 'updated_at'];

    protected $with = ['tables'];

    public function tables() {
        return $this->hasMany('App\Model\Table');
    }
}
