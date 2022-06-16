<?php

namespace App\Http\Controllers\Site\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index($id)
    {
        $company = Company::with('products')->findOrFail($id);
        return view('site.pages.company.index',compact('company'));
    }
}
