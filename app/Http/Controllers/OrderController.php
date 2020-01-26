<?php

namespace App\Http\Controllers;

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
        return view('checkout.app');
    }

    public function createOrder(Request $request, \Cart $cart)
    {

        $request->validate([
            'costumer_full_name' => 'required|max:50',
            'costumer_phone_number' => 'required',
            'costumer_email' => 'email',
            'delivery_address' => 'required'
        ]);
        $args = array_push($request->all(), ['amount' => $cart->totalPrice]);

        try {
            $order = Order::create($args);
            $orderItems = data_fill($cart->getProductIdAndCount(), '*.order_id', $order->id);
            OrderItems::create([$orderItems]);
        } catch (\Exception $exception) {
            return $exception;
        }
        return redirect()->route('home');
    }
}
