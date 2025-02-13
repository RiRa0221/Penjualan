<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'email'    => 'required|string|email|max:255|unique:users',
            'name'     => 'required|string|max:255',
            'alamat'   => 'required|string|max:255',
        ]);

        // Buat user baru
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email'    => $request->email,
            'name'     => $request->name,
            'alamat'   => $request->name,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful.');
    }

    public function login(Request $request)
    {
        // Validasi data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Autentikasi user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Atau sesuaikan dengan rute yang Anda inginkan setelah logout
    }
}