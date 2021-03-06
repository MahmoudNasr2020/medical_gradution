<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Request::is('dashboard/*'))
            {
                return route('dashboard.login.index');
            }
            return route('site.loginUser');

        }
    }
}
