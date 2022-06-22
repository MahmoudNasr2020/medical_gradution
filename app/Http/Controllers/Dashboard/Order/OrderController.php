<?php

namespace App\Http\Controllers\Dashboard\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        return view('dashboard.pages.orders.order',compact('orders'));
    }
}
