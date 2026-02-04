<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OwnerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek session
        if (!$request->session()->has('is_owner')) {
            return redirect()->route('owner.login')->with('error', 'Akses ditolak! Silakan login.');
        }

        return $next($request);
    }
}
