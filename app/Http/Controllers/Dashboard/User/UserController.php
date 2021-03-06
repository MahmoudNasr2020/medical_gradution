<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:عرض-المستخدم', ['only' => ['index','show']]);
        $this->middleware('permission:طلبات-المستخدم', ['only' => ['orders','status','invoice']]);
        $this->middleware('permission:حذف-المستخدم', ['only' => ['destroy']]);
    }
    public function index()
    {
        $users = User::get();
        return view('dashboard.pages.user.user',compact('users'));
    }

    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('dashboard.pages.user.show',compact('data'));
    }
    public function orders($id)
    {
        $user = User::with('orders')->findOrFail($id);
        return view('dashboard.pages.user.orders',compact('user'));
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->orders()->delete();
        $data->delete();
        flash('تم حذف المستخدم بنجاح','alert alert-danger');
        return back();
    }

    public function status(Request $request)
    {
        $order = Order::find($request->order_id);
        if($order)
        {
            $order->update(['status'=>$request->order_status]);
            return 'done';
        }
    }

    public function invoice($order_id)
    {
        $order = Order::where('order_id',$order_id)->first();
        if(!$order)
        {
            return abort(404);
        }
        return view('dashboard.pages.user.invoice',compact('order'));
    }
}
