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
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Proses Autentikasi (Cek Username & Password)
        $request->authenticate();

        // 2. Regenerasi Session (Keamanan)
        $request->session()->regenerate();

        // 3. LOGIKA REDIRECT BERDASARKAN ROLE
        $user = $request->user();

        // Cek Role (Superadmin atau Admin)
        if ($user->role === 'superadmin' || $user->role === 'admin') {
            // PERBAIKAN DISINI:
            // Mengarahkan ke route 'admin.dashboard' yang sudah kita definisikan di web.php
            return redirect()->intended(route('admin.dashboard'));
        }

        // Jika User biasa, arahkan ke Dashboard User
        return redirect()->intended(route('home', absolute: false));
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