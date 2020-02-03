<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Order
 *
 * @property int $id
 * @property float $amount
 * @property int $order_status_id
 * @property int $user_id
 * @property string $costumer_full_name
 * @property string $costumer_phone_number
 * @property string $costumer_email
 * @property int $payment_method
 * @property string $region
 * @property string $delivery_address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCostumerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCostumerFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCostumerPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereDeliveryAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereOrderStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    protected $fillable = [
        'costumer_full_name', 'costumer_phone_number', 'costumer_email', 'delivery_address','amount'
    ];
}
