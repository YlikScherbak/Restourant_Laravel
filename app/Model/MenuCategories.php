<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MenuCategories extends Model
{

    protected $table = 'menu_categories';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['category'];

    public function subCategories() {
        return $this->hasMany(SubCategories::class, 'category_id', 'id');
    }


}
