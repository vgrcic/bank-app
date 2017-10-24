<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class LoginMiddleware
{
    /**
     * Redirects guests to login page
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() == null)
            return redirect('/login');
        return $next($request);
    }
}
