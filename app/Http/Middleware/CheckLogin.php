<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Mengecek apakah ada session 'user'
        if (!session()->has('user')) {
            // Jika tidak ada, redirect ke halaman login
            return redirect()->route('login');
        }

        // Jika ada, lanjutkan request ke controller
        return $next($request);
    }
}