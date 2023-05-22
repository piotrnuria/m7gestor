<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $rol): Response
    {
        if (Auth::check()) {$user = Auth::user();
            if ($user->rol == $rol) {
                return $next($request);
            }
        }

            abort(403, 'No es tu rol.');
    }
}
