<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'description', 'image_id', 'product_count'
    ];


    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_category', 'category_id', 'product_id');
    }
    public function image(){
        return $this->hasOne('App\Image','id','image_id');
    }
}
