<?php

namespace App\Http\Controllers\Site\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index($id)
    {
        User::findOrFail($id);
        $orders = Order::where('user_id',Auth::user()->id)->get();
        return view('site.pages.user.order',compact('orders'));
    }
}
