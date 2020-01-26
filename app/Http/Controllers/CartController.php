<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function __construct()
    {

    }

    public function getCart()
    {
        return \Response::json([
            'cart' => \Cart::get()
        ]);
    }

    public function addToCart(Request $request, Product $product)
    {
        $cart = \Cart::add($product, $request->has('qty') ? $request->qty : 1)->save();

        return \Response::json([
            'cart' => $cart
        ]);
    }

    public function editCart(Request $request, \Cart $cart, $id)
    {
        $cart = \Cart::edit($id, $request->qty)->save();

        return \Response::json([
            'cart' => $cart
        ]);
    }


    public
    function unsetFromCart(Request $request, \Cart $cart, $id)
    {
        $cart = \Cart::delete($id)->save();
        return \Response::json([
            'cart' => $cart
        ]);
    }
}
