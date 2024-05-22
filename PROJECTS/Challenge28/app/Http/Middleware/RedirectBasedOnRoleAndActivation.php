<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRoleAndActivation
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();

        if (!$user->is_active) {
            Auth::logout();

            if (is_null($user->token)) {
                return redirect('login')->withErrors(['message' => 'Your account is deactivated. Contact support for more information.']);
            } else {
                return redirect('login')->withErrors(['message' => 'Your account is not activated yet.']);
            }
        }

        if ($user->type === 'admin') {
            return redirect('/admin/admin-dashboard');
        } elseif ($user->type === 'regular') {
            return redirect('/user/user-dashboard');
        }

        return $next($request);
    }
}
