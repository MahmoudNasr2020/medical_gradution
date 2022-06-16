<?php

namespace App\Http\Controllers\Company\Order;

use App\Http\Controllers\Controller;
use App\Models\BestSeller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Object_;

class OrderController extends Controller
{
    public function index()
    {
        $products = BestSeller::all();
        $company_products=[];
        foreach ($products as $product)
        {
            $item = Product::where(['id'=>$product->product_id,'company_id'=>Auth::guard('company')->user()->id])->first();
            if($item)
            {
                $item->quantity = $product->quantity;
                array_push($company_products,$item);
            }
        }

        return view('company.pages.orders.index',compact('company_products'));
    }

    public function budget()
    {
        $products = BestSeller::all();
        $company_products=[];
        $total_price = 0;
        foreach ($products as $product)
        {
            $item = Product::where(['id'=>$product->product_id,'company_id'=>Auth::guard('company')->user()->id])->first();
            if($item)
            {
                $total_price = $total_price + ($product->quantity * $item->price);
            }
        }
        return view('company.pages.budget.index',compact('total_price'));
    }
}
