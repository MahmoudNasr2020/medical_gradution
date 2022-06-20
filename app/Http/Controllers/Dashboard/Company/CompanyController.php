<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::get();
        return view('dashboard.pages.company.company',compact('companies'));
    }

    public function show($id)
    {
        $data = Company::findOrFail($id);
        return view('dashboard.pages.company.show',compact('data'));
    }

    public function destroy($id)
    {
        $data = Company::findOrFail($id);
        $data->products()->delete();
        $data->delete();
        flash('تم حذف الشركة بنجاح','alert alert-danger');
        return back();
    }
    public function prodcuts($id)
    {
        $company = Company::with('products')->findOrFail($id);
        return view('dashboard.pages.company.products',compact('company'));
    }


    public function showProduct($id)
    {
        $data = Product::findOrFail($id);
        return view('dashboard.pages.company.showProduct',compact('data'));
    }

    public function destroyProduct($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        flash('تم حذف المنتج بنجاح','alert alert-danger');
        return back();
    }
}