<?php

namespace App\Http\Middleware;

use Closure;

class LogSessionVerify
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
        if($request->session()->has('uid')){
            return redirect($request->session()->get('role')."/profile");
        }
        else
        {
            return $next($request);
        }
    }
}
