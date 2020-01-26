<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderItems
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItems newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItems newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItems query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItems whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItems whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItems whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItems whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderItems whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderItems extends Model
{
    protected $fillable = [
        'order_id','product_id'
    ];
}
