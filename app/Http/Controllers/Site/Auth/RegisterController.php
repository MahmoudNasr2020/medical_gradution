<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function indexUser()
    {
        return view('site.pages.auth.register');
    }

    public function registerUser(RegisterRequest $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone_number'    => $request->phone_number,
            'address'    => $request->address,
            'password' =>Hash::make($request->password),
        ]);
        if($user)
        {
            Auth::login($user);
            return redirect()->route('site.home');
        }
        return abort(404) ;
    }
}
