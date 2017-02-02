<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Support\Facades\Auth;
use Sentinel;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       // if (Auth::guard($guard)->check()) {
       //     return redirect('/home');
      //  }
        if (Sentinel::check()) {
            return redirect()->action('HomeController@index');
        }
        return $next($request);
    }
}
