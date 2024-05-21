<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();

            $request->session()->regenerate();

            if (Auth::user()->roleId === 1) {
                return redirect()->intended(route('dashboard', absolute: false));
            } else {
                return redirect()->intended(route('home', absolute: false));
            }
        } catch (ValidationException $e) {
            // Check if the error message contains the message related to password Bcrypt algorithm
            if (str_contains($e->getMessage(), 'This password does not use the Bcrypt algorithm')) {
                return redirect()->route('login')->withErrors(['email' => 'This email is already registered. Please use another method to login.']);
            }
            throw $e;
        }
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
