<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

     public function store(Request $request)
     {
         $request->validate([
             'username' => 'required|string',
             'password' => 'required|string',
         ]);
 
         if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->filled('remember'))) {
             $request->session()->regenerate();
             return redirect()->intended(RouteServiceProvider::HOME);
         }
 
         throw ValidationException::withMessages([
             'username' => __('auth.failed'),
         ]);
     }
 
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
