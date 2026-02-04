<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Display the admin login view.
     */
    public function createAdmin(): View
    {
        return view('ui.admin.signup');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));
    }

    /**
     * Handle an incoming admin authentication request.
     */
    public function storeAdmin(\Illuminate\Http\Request $request): RedirectResponse
    {
        $request->validate([
            'admin_email' => ['required', 'string'],
            'admin_pass' => ['required', 'string'],
        ]);

        if (Auth::guard('admin')->attempt(['admin_email' => $request->admin_email, 'password' => $request->admin_pass], $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard', absolute: false));
        }

        return back()->withErrors([
            'admin_email' => 'The provided credentials do not match our records.',
        ])->onlyInput('admin_email');
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

    /**
     * Destroy an authenticated admin session.
     */
    public function destroyAdmin(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        // Do not invalidate session or regenerate token to keep User login active
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/signup');
    }
}
