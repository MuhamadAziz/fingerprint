<?php

namespace App\Http\Middleware;

use Closure;

class petugas_piket
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
        if (auth()->check() && $request->user()->level == 'petugas_piket') {
            return $next($request);   
        }else{
            return redirect()->guest('/admin')->with('message','Maaf anda tidak memiliki izin untuk mengakses halaman tersebut.');
        }
    }
}
