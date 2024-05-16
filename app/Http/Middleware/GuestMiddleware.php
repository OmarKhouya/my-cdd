<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*
        /   check if the partner or user is logged in.
        /   this middleware is used to prevent partner and user to reach each others login, register pages,
        **/
        
        if(Auth::guard('partner')->check()) {
            return redirect()->route('partner.dashboard');
        }

        if(Auth::check()){
            return redirect()->route('member.dashboard');
        }

        return $next($request);
    }
}
