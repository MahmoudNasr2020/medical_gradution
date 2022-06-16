<?php

namespace App\Http\Controllers\Site\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoice($order_id)
    {
         $order = Order::where('order_id',$order_id)->first();
        if(!$order)
        {
            return abort(404);
        }
        return view('site.pages.checkout.invoice',compact('order'));
    }
}
