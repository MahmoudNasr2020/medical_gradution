<?php

namespace App\Http\Controllers\Dashboard\Company;

use App\Http\Controllers\Controller;
use App\Models\BestSeller;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:عرض-الشركة',   ['only' => ['index','show']]);
        $this->middleware('permission:منتجات-الشركة', ['only' => ['prodcuts','showProduct','destroyProduct']]);
        $this->middleware('permission:حذف-الشركة',   ['only' => ['destroy']]);
    }

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
        foreach ($data->products as $product)
        {
            BestSeller::where('product_id',$product->id)->first()->delete();
        }
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
