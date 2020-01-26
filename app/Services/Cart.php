<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 24.01.2020
 * Time: 10:30
 */

namespace App\Services;


use Illuminate\Support\Facades\Request;

class Cart
{
    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct()
    {
        $this->get();
    }

    public function get()
    {
        $oldCard = \Session::has('cart') ? \Session::get('cart') : null;
        if ($oldCard) {
            $this->items = $oldCard->items;
            $this->totalPrice = $oldCard->totalPrice;
            $this->totalQty = $oldCard->totalQty;
        }
        return $this;
    }

    protected function getItem($item)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($item->id, $this->items)) {
                $storedItem = $this->items[$item->id];
            }
        }
        return $storedItem;
    }

    public function add($item, $count = 1)
    {
        $this->get();
        $storedItem = $this->getItem($item);
        $storedItem['qty'] += $count;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$item->id] = $storedItem;
        $this->totalPrice += $item->price * $count;
        $this->totalQty += $count;
        return $this;

    }

    public function edit($id, $qty)
    {
        $this->get();
        $item = $this->items[$id];
        $this->totalQty += $qty - $item['qty'];
        $this->totalPrice += ($qty - $item['qty']) * $item['item']->price;
        $this->items[$id]['qty'] = $qty;
        $this->items[$id]['price'] = $qty * $item['item']->price;
        return $this;

    }

    public function delete($id)
    {
        $this->get();
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
        return $this;
    }

    public function isEmpty()
    {
        $this->get();
        return !(bool)$this->totalQty;
    }

    public function getProductIdAndCount()
    {
        $this->get();
        $products = [];
        foreach ($this->items as $item) {
            array_push($products, ['product_id' => $item['item']->id, 'qty' => $item['qty']]);
        }
        return $products;
    }

    public function save()
    {
        \Session::put('cart', $this);
        return $this;
    }
}
