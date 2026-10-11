<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * Protects every /admin/* route except the login screen itself.
     * Anyone not authenticated, or authenticated but not flagged
     * as an admin user, is redirected back to the admin login form.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || ! $user->is_admin) {
            auth()->logout();

            return redirect()->route('admin.login')
                ->with('error', 'Please sign in with an administrator account to continue.');
        }

        return $next($request);
    }
}
