<?php

namespace App\Http\Controllers\Company\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Object_;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $data_success = [];
        $data_pending = [];
        $old_product='';
        foreach ($orders as $order) {
            foreach (json_decode($order->order_list) as $item) {
                if ($order->status == 'success')
                {
                    $product = Product::where(['id' => $item->product_id, 'company_id' => Auth::guard('company')->user()->id])->first();
                    if ($product)
                    {
                        $product->quantity = $item->quantity;
                        $product->total_price = $item->total_price;
                        $product->price_product = $item->price_product;
                        $product->status = $order->status;
                        $product->order_created_at = $order->created_at;
                        $product->order_updated_at = $order->updated_at;
                        array_push($data_success,$product);

                    }
                }
                elseif ($order->status == 'pending')
                {
                    $product = Product::where(['id' => $item->product_id, 'company_id' => Auth::guard('company')->user()->id])->first();
                    if ($product)
                    {
                        $product->quantity = $item->quantity;
                        $product->total_price = $item->total_price;
                        $product->price_product = $item->price_product;
                        $product->status = $order->status;
                        $product->order_created_at = $order->created_at;
                        $product->order_updated_at = $order->updated_at;
                        array_push($data_pending,$product);
                    }
                }
            }
        }
        return view('company.pages.orders.index',compact('data_success','data_pending'));
    }

    public function budget()
    {
        $orders = Order::all();
        $old_price=0;
        foreach ($orders as $order) {
            foreach (json_decode($order->order_list) as $item) {
                if ($order->status == 'success')
                {
                    $product = Product::where(['id' => $item->product_id, 'company_id' => Auth::guard('company')->user()->id])->first();
                    if ($product)
                    {
                        $old_price = $old_price + $item->total_price;
                    }
                }
            }
        }
        return view('company.pages.budget.index',compact('old_price'));
    }
}
