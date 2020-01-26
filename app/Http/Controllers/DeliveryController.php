<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function getCities(Request $request)
    {
        return \Response::json([
            'cities'=>\NovaPoshta::getCities($request->string)
        ]);
    }
}
