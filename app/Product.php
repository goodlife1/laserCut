<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'supplier_id', 'wholesale_price',
        'wholesale_min_count', 'discount', 'price', 'proprieties'
    ];


    public function images()
    {
        return $this->hasMany('App\Image', 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsToMany('App\Product', 'product_category', 'product_id', 'category_id');
    }
}
