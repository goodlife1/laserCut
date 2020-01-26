<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 25.01.2020
 * Time: 0:18
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class NovaPoshtaService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'novaPoshta';
    }
}
