<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all(['id','category_name']);
        $banner_products = Product::has('category')->with('category:id,category_name')->inRandomOrder()->limit(2)->get();
        $products = Product::has('category')->with('category:id,category_name')->orderBy('id','desc')->limit(10)->get();
        return view('site.pages.home',compact('categories','banner_products','products'));
    }
}
