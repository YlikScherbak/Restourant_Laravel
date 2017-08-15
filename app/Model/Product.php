<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'id', 'price', 'prod_name', 'subcategory_id'
    ];

    public function subCategory() {
        return $this->belongsTo('App\Model\SubCategories', 'subcategory_id', 'id');
    }
}
