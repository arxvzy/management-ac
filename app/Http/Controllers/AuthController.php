<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $remember = false;

        if ($request->has('remember')) {
            $remember = true;
        }

        $credentials['is_active'] = true;
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function reset(Pengguna $pengguna)
    {
        return view('admin.pengguna.reset', compact('pengguna'));
    }

    public function update(Request $request, Pengguna $pengguna)
    {
        $validated = $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);
        $validated['password'] = bcrypt($request->password);

        $pengguna->update($validated);
        return redirect()->route('admin.pengguna.index');
    }
}
