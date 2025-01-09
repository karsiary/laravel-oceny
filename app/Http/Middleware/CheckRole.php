<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user()) {
            abort(403, 'Brak dostępu.');
        }

        // Administrator ma dostęp do wszystkich paneli
        if ($request->user()->hasRole('admin')) {
            return $next($request);
        }

        // Dla innych ról sprawdzamy uprawnienia
        if (!$request->user()->hasRole($role)) {
            abort(403, 'Brak dostępu.');
        }

        return $next($request);
    }
} 