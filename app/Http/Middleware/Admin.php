<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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

        if(Auth::user()->role->name === 'Admin')
            return $next($request);
        else
            return redirect()->route('home');
    }
}
