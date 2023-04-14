<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role == '3'){
                return $next($request);
            }else{
                return redirect('/')->with('message', 'Access Denied You are not a Seller');
            }
        }else{
            return redirect('/login')->with('message', 'Access Denied You are not a Seller');
        }


        return $next($request);
    }
}
