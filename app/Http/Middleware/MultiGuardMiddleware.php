<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate;

class MultiGuardMiddleware extends Authenticate
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }

        foreach ($guards as $guard) {
            if (auth()->guard($guard)->check()) {
                $request->attributes->add(['guard' => $guard]);
                return $next($request);
            }
        }

        return $this->unauthenticated($request, $guards);
    }
}
