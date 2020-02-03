<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::inRandomOrder()->limit(3)->get();
        $products = Product::inRandomOrder()->limit(4)->get();
        return view('home', ['categories' => $categories, 'products' => $products]);
    }

    public function shop()
    {
        $categories = Category::all(['id', 'name']);
        $products = Product::getByCategory($categories[0]->id)->get();

        return view('shop.shop', ['products' => $products, 'categories' => $categories]);
    }



    public function getProducts(Request $request)
    {
        $sort = ['created_at', 'asc'];
        if ($request->has('sortBy')) {
            $sort = explode(' ', $request->get('sortBy'));
        }

        $products = Product::getByCategory($request->category_id)
            ->filterByPrice($request->only('minPrice', 'maxPrice'))->orderBy(...$sort)->paginate(15);
        $minAndMaxPrice = Product::getByCategory($request->category_id)->getMinAndMaxPrice()->first();

        return response()->json([
            'product' => $products,
            'price' => $minAndMaxPrice
        ]);
    }
}
