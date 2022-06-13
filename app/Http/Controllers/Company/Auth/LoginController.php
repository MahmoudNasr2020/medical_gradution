<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\User\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginCompany(LoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if($user = Auth::guard('company')->attempt(['email'=>$request->email,'password'=>$request->password],$remember_me))
        {
            return redirect()->route('company.test');
        }
        return redirect()->route('site.loginUser')->with(['login_error'=>'خطأ في بيانات الدخول']);
    }

    public function logoutCompany()
    {
        Auth::guard('company')->logout();
        return redirect()->route('site.home');
    }
}
