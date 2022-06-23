<?php

namespace App\Http\Controllers\Dashboard\Budget;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function budget()
    {
         $total_price = Order::select('total_price')->get()->sum('total_price');
        return view('dashboard.pages.budget.budget',compact('total_price'));
    }
}
