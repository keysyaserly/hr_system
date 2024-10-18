<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard'); // Redirect ke halaman dashboard
        }

        return redirect()->back()->withErrors(['message' => 'Login failed! Please check your credentials and try again.']);
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Redirect ke halaman login setelah logout
    }
}
