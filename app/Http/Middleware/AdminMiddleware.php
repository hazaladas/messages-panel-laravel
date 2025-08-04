<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->role ==='admin'){
            return $next($request);
        }
        abort(403, 'bu sayfaya erişim izniniz yok');
    }
}
