<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        //$remember_me = $request->has('remember_me') ? true : false;
        if($admin = Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect()->route('dashboard.home');
        }
        return back()->with(['login_error'=>'خطأ في بيانات الدخول']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('dashboard.login.index');
    }
}
