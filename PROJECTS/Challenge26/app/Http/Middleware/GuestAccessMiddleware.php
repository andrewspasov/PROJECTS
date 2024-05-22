<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuestAccessMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'guest') {
            return $next($request);
        }
        return redirect('/');
    }
}
