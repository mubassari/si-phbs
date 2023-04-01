<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class Authentication extends Controller
{
    function viewFormLogin()
    {
        return view('pages.account.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerateToken();
            return redirect(route('beranda'));
        } else {
            return redirect()->back()->onlyInput('email')->withErrors([
                'error' => 'No Telpon dan kata sandi tidak sesuai.'
            ]);
        }
    }

    function viewFormRegister()
    {
        return view('pages.account.register');
    }
    function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $name_file = $request->foto_ktp->hashName();
        $request->foto_ktp->move('img/foto-ktp', $name_file);
        $validated['foto_ktp'] = $name_file;
        $validated['password'] = bcrypt($request->password);
        User::create($validated);
        return redirect()->route('login')->with('success', 'Berhasil melakuakn pendaftaran, silakan masuk untuk mengisi survey pada sistem kami.');
    }

    function logout(Request $request)
    {
        \Illuminate\Support\Facades\Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('beranda'));
    }
}
