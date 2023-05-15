<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user())
        return to_route('login');
        if (Auth::user()->role=="user") {
            return $next($request);
        }
       else {
            return redirect(route('login'));
        }
    }
}
