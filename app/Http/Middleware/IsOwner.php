<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() && Auth::user()->roles == "owner") {
            return $next($request);
        } else if (Auth::user() && Auth::user()->roles == "user") {
            return redirect('/legal');
        } else if (Auth::user() && Auth::user()->roles == "admin") {
            return redirect('/admin');
        }

        return redirect('/login');
    }
}
