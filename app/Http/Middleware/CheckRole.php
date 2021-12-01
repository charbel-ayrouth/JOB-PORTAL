<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $roles = [
            'admin' => 1,
            'JobSeeker' => 2,
            'JobProvider' => 3,
        ];

        $roleIds = $roles[$role] ?? 2;
        if (auth()->user()->role_id == $roleIds) {
            return $next($request);
        }
        abort(code: 403);
    }
}
