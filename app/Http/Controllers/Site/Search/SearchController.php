<?php

namespace App\Http\Controllers\Site\Search;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
         $data = Product::where('name','LIKE',"%{$request->name}%")->get();
         return view('site.pages.search.search',compact('data'));
    }
}
