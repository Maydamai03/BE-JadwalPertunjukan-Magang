<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if ($request->user()->role !== $role) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        return $next($request);
    }
}
