<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        \Log::info('In AdminMiddleware');
        if(auth()->guard('admin')->check()){
            \Log::info('AdminMiddleware Success');
            return $next($request);
        }
        \Log::info('In AdminMiddleware Fail');
        return redirect()->route('login');
    }
}
