<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Company\Auth\RegisterRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerCompany(RegisterRequest $request)
    {
        $user = Company::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone_number'    => $request->phone_number,
            'location'    => $request->location,
            'password' =>Hash::make($request->password),
        ]);
        if($user)
        {
            Auth::guard('company')->login($user);
            return redirect()->route('company.home');
        }
        return abort(404) ;
    }
}
