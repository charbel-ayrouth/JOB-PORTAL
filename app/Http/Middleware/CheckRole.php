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
            'jobSeeker' => 2,
            'jobProvider' => 3,
        ];
        if (!in_array(auth()->user()->role_id, $roles)) {
            abort(403);
        }
        return $next($request);
    }
}
