<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
    $categories = Category::inRandomOrder()->limit(3)->get();
       return  view('home',['categories'=>$categories]);
    }
}
