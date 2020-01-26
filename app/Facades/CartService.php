<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 24.01.2020
 * Time: 10:43
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CartService extends Facade
{

    protected static function getFacadeAccessor()
 {
    return 'cart';
 }
}
