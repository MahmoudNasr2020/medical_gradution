<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard == 'admin')
                {
                    return redirect()->route('dashboard.home');
                }
                elseif ($guard == 'company')
                {
                    return redirect()->route('company.home');
                }
                return redirect()->route('site.home');
            }
        }

        return $next($request);
    }
}
