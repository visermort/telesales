<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class AdminMiddleware
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
        //пока проверка администратора по его email
        //в дальнейшем -  по емеил и по ролям в sentinel
        $user = Sentinel::check();
        if ($user == null || $user->email != config('telesales.adminEmail')) {
            return redirect()->action('Auth\CartalistController@index');
        }
        return $next($request);
    }
}
