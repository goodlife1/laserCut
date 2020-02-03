<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function getCities(Request $request)
    {
        $cities = \NovaPoshta::getCities($request->string);

        return \Response::json([
            'cities' => $cities
        ]);
    }

    public function getWarehouses(Request $request)
    {
        $warehouses = \NovaPoshta::getWareHouses($request->ref);
        return $warehouses;
    }
}
