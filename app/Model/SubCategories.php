<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    protected $table = 'sub_categories';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['id', 'sub_category', 'category_id'];

    public function products() {
        return $this->hasMany(Product::class, 'subcategory_id', 'id');
    }

    public function category() {
        return $this->belongsTo(MenuCategories::class, 'category_id', 'id');
    }
}
