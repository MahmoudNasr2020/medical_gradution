<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\BestSeller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all(['id','category_name']);
        $banner_products = Product::has('category')->with('category:id,category_name')->inRandomOrder()->limit(2)->get();
        $products = Product::has('category')->with('category:id,category_name')->orderBy('id','desc')->limit(10)->get();
        $best_sellers = BestSeller::orderBy('quantity','desc')->take(10)->get();
        $companies = Company::get();
        return view('site.pages.home',compact('categories','banner_products','products','best_sellers','companies'));
    }
}
