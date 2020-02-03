<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewOrderRequest;
use App\Order;
use App\OrderItems;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $cart;

    public function __construct()
    {

    }

    public function index()
    {
        $cities = \NovaPoshta::getCities();
        $cities = array_column($cities, 'Ref', 'Description');
        return view('checkout.app', [
            'deliveryCities' => json_encode($cities)
        ]);
    }

    public function createOrder(NewOrderRequest $request)
    {

        $cart = \Cart::get();
        $args = array_merge($request->all(), ['amount' => $cart->totalPrice]);
        try{
        $order = Order::create($args);

            $products = $cart->getProductIdAndCount();
            $orderItems = data_fill($products, '*.order_id', $order->id);
            foreach ($orderItems as $item) {
                OrderItems::create($item);
            }
            \Cart::clear();
        }catch (\Exception $e){

        }
        return true;
    }

}
