<?php

namespace App\Http\Controllers\Site\Favourite;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Favourite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function index($id)
    {
        User::findOrFail($id);
        $favourites = Favourite::where('user_id',Auth::user()->id)->get();
        return view('site.pages.favourite.index',compact('favourites'));
    }

    public function store(Request $request)
    {
        if($request->status =='not_active')
        {
            $item = Favourite::where([ 'user_id'=>Auth::user()->id,'product_id' => $request->product_id])->first();
            if($item)
            {
                return 'exists';
            }
            Favourite::updateOrCreate([
                'user_id'=>Auth::user()->id,
                'product_id' => $request->product_id
            ]);

            return 'stored';
        }
        else{
            $item = Favourite::where([ 'user_id'=>Auth::user()->id,'product_id' => $request->product_id])->first();
            if(!$item)
            {
                return 'not_found';
            }
            $item->delete();
            return 'removed';
        }

    }

    public function delete(Request $request)
    {
        $item = Favourite::where(['user_id'=>Auth::user()->id])->where(['product_id'=>$request->product_id])->first();
        if(!$item)
        {
            return abort(404);
        }
        $item->delete();
        return back()->with('fav_delete','success');
    }
}
