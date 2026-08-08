<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function showAdminLogin()
    {
        return redirect()->route('login');
    }

    public function loginAdmin(Request $request)
    {
        return $this->loginShared($request, 'admin');
    }

    public function showPimpinanLogin()
    {
        return redirect()->route('login');
    }

    public function loginPimpinan(Request $request)
    {
        return $this->loginShared($request, 'pimpinan');
    }

    protected function loginShared(Request $request, string $role): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended(route('peti-kemas.index'));
            }

            if ($user->role === 'operasional') {
                return redirect()->intended(route('dashboard'));
            }

            return redirect()->intended(route('laporan.index'));
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
}