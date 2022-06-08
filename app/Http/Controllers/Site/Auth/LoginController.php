<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\User\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function indexUser()
    {
        return view('site.pages.auth.login');
    }

    public function loginUser(LoginRequest $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;
        if($user = Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember_me))
        {
            return redirect()->route('site.home');
        }
        return redirect()->route('site.loginUser')->with(['login_error'=>'خطأ في بيانات الدخول']);
    }

    public function logoutUser()
    {
        Auth::logout();
        return redirect()->route('site.home');
    }
}
