<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category:id,category_name')->get();
        return view('dashboard.pages.product.index',compact('products'));
    }
    public function show($id)
    {
        $data = Product::findOrFail($id);
        return view('dashboard.pages.product.show',compact('data'));
    }

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        flash('تم حذف المنتج بنجاح','alert alert-danger');
        return back();
    }
}
