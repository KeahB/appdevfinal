<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login'); // Redirect to the named login route
        }
    }

    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (Auth::guard()->guest()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }

            return redirect()->guest($this->redirectTo($request));
        }

        return $next($request);
    }
}
