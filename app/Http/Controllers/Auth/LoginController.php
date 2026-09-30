<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Login Page
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password, ], $request->filled('remember'))) {

            return back()
                ->withErrors([
                    'username' => 'Invalid username or password.'
                ])
                ->onlyInput('username');
        }

        $request->session()->regenerate();

        if (!auth()->user()->status) {

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->with('error', 'Your account is inactive.');
        }

        return redirect()->route('dashboard');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}