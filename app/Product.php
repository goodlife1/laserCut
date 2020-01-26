<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Product
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $supplier_id
 * @property float $wholesale_price
 * @property int $wholesale_min_count
 * @property int $discount
 * @property float $price
 * @property mixed $properties
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $category
 * @property-read int|null $category_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product filterByPrice($data)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product getByCategory($id)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product getMinAndMaxPrice()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSupplierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereWholesaleMinCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereWholesalePrice($value)
 * @mixin \Eloquent
 */
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

    public function getProductByCategory($id)
    {
        return $this->belongsToMany('App\Product', 'product_category', 'product_id', 'category_id')
            ->where('category_id', $id);

    }

    public function scopeGetByCategory(Builder $query, $id)
    {
        return $query->whereHas('category', function ($q) use ($id) {
            $q->where('category_id', $id);
        })->with('images');

    }

    public function scopeFilterByPrice(Builder $query, $data)
    {
        if (isset($data['minPrice']) && isset($data['maxPrice']) ) {
            return $query->where('price', '>', $data['minPrice'])
                ->where('price', '<', $data['maxPrice']);
        }
        return $query;
    }

    public function scopegetMinAndMaxPrice(Builder $query)
    {
        $query->select(\DB::raw("MIN(price) as minPrice, MAX(price) as maxPrice"));

    }
}
