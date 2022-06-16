<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BestSeller;
use Illuminate\Http\Request;

class BestSellerController extends Controller
{
    public function index()
    {
        $best_sellers = BestSeller::with(['product'=>function ($q){
            return $q->with('category','company');
        }])->orderBy('quantity','desc')->take(10)->get();
        $data = [
            'products' => $best_sellers,
            'status' => 200,
            'msg' => 'success'
        ];
        return response()->json($data);
    }
}
