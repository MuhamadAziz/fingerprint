<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfGuruAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/guru');
        }
        return $next($request);
    }
}
