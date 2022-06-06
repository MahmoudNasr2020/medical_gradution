<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        $product = Product::with('category:id,category_name')->findOrFail($id);
        return view('site.pages.product.index',compact('product'));
    }

    public function getProduct(Request $request)
    {
        $product = Product::with('category:id,category_name')->findOrFail($request->id);
        return $product;
    }
}
