<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authentication extends Controller
{
    function viewFormLogin()
    {
        return view('pages.account.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'telpon'   => [
                'required',
                'numeric',
                'starts_with:08,62',
                'regex:/^(62|08)[0-9]{9,13}$/',
            ],
            'password' => 'required',
        ], [], ['password' => 'Kata Sandi']);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerateToken();
            return redirect(route('beranda'));
        } else {
            return back()->withInput()->withErrors([
                'password' => 'No Telpon dan kata sandi tidak sesuai.'
            ]);
        }
    }

    function viewFormRegister()
    {
        return view('pages.account.register');
    }
    function register(UserRequest $request)
    {
        $validated = $request->validated();
        if ($validated['password'] == substr($request->telpon, -4, 4)) {
            return back()->withInput()->withErrors(['password' => 'Isian ini wajib diisi']);
        }
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
