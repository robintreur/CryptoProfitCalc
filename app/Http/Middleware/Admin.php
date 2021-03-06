<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }else if(Auth::check()){
            return redirect()->route('cryptos');
        }
        return redirect()->route('welcome');
    }
}
