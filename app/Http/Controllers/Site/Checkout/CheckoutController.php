<?php

namespace App\Http\Controllers\Site\Checkout;

use App\Http\Controllers\Controller;
use App\Http\services\Paymob;
use App\Models\BestSeller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index($id)
    {


        User::findOrFail($id);
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        return view('site.pages.checkout.index',compact('carts'));
    }


    public function pay(Request $request,Paymob $paymob)
    {
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        if(!$carts)
        {
            return abort(404);
        }
        $name = Auth::user()->name;
        $paymob = $paymob->credit($carts->sum('price')*100,$name,Auth::user()->phone_number,Auth::user()->email,Auth::user()->address,$request->notes);
        return $paymob;
    }

    public function callback(Request $request,Paymob $paymob)
    {

        $callback = $paymob->callback($request);
        if($callback['process'] == 'secret')
        {
            $carts = Cart::where('user_id',Auth::user()->id)->get();
            if(!$carts)
            {
                return abort(404);
            }
            $order_list = [];
            foreach ($carts as $cart)
            {
                $order_list[] = [
                    'product_id'=> $cart->product_id,
                    'quantity' => $cart->quantity,
                    'total_price' => $cart->price,
                    'price_product' =>$cart->product->price
                ];
                $best_seller = BestSeller::where('product_id',$cart->product_id)->first();
                if($best_seller)
                {
                    $best_seller->increment('quantity',$cart->quantity);
                }
                else
                {
                    BestSeller::create([
                        'product_id'=>$cart->product_id,
                        'quantity' => $cart->quantity
                    ]);
                }
                $cart->delete();
            }
           Order::create([
               'user_id' => Auth::user()->id,
               'order_list' => json_encode($order_list),
               'total_price' => $callback['total_price'],
               'order_id'=> $callback['order_id'],
           ]);
        }
        return redirect()->route('site.home')->with(['payment'=>'success']);
    }

}

