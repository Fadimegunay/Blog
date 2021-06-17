<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserLoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->exists('user') || $request->session()->get('user') != null){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
