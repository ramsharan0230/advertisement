<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Vendor
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
        if(!Auth::id())
            return redirect()->route('login')->with('msg', 'Your are not Authorized for Admin Panel');
            
        if(Auth::user()->role->name === 'Vendor')
            return $next($request);
        else
            return redirect()->route('home');
    }
}
