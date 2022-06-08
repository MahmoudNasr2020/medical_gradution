<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index($id)
    {
        User::findOrFail($id);
         $all_carts = Cart::with('product:id,name,price,image')->where('user_id',Auth::user()->id)->get();
        return view('site.pages.cart.index',compact('all_carts'));
    }

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        if(!$product)
        {
            return 'error';
        }
        $cart = Cart::where(['user_id'=>Auth::user()->id,'product_id'=>$request->product_id])->first();

        if($cart)
        {
            $cart->increment('quantity');
            $cart->increment('price',Product::where('id',$request->product_id)->first()->price);
            return 'cart_exists';
        }
        else
        {
            $cart = Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'price' => Product::where('id',$request->product_id)->first()->price,
                'quantity' => 1,
            ]);
            return 'new_cart';
        }
    }

    public function update(Request $request)
    {
        foreach ($request->data as $item)
        {
            $cart = Cart::find($item['cart_id']);
            $cart->update([
                'quantity' =>$item['quantity'],
                'price'    => $cart->product->price * $item['quantity']
            ]);
        }
        $total_price = Cart::where('user_id',Auth::user()->id)->sum('price');
        return $total_price ;
    }

    public function delete(Request $request)
    {
       $cart = Cart::find($request->data);
       if($cart)
       {
           $cart->delete();
       }
        $total_price = Cart::where('user_id',Auth::user()->id)->sum('price');
        return $total_price ;
    }
}
