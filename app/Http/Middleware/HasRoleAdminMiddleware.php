<?php

namespace App\Http\Middleware;

use Closure;

class HasRoleAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->role !== 0) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
