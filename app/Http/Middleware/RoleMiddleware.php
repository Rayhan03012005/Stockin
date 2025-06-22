<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!session('user_id') || session('role') !== $role) {
            return redirect()->route('login')->with('error', 'Akses ditolak. Role tidak sesuai.');
        }

        return $next($request);
    }
}