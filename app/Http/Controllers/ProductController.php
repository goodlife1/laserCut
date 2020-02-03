<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function singleProduct($id)
    {

        $product = Product::with('images')->with('category')->find($id);
        return view('shop.single_product',
            [   'product' => $product,
                'category' => $product->category,
                'images' => $product->images]);
    }
}
