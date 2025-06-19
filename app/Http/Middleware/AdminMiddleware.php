<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()) {
            // Normalisasi role supaya tidak error karena spasi/kasus
            $role = strtolower(trim(Auth::user()->role));

            if ($role === 'admin') {
                return $next($request); // ✅ admin boleh lewat
            }

            // Jika login tapi bukan admin
            return redirect()->route('user.dashboard');
        }

        // Jika belum login
        return redirect()->route('login');
    }
}
