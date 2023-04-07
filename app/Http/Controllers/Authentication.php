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
            return redirect()->intended(route('beranda'))->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil masuk!'
            ]);
        } else {
            return redirect()->back()->onlyInput('email')->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Nomor telpon atau Kata sandi Anda salah!'
            ]);
        }
    }

    function viewFormRegister()
    {
        return view('pages.account.register');
    }
    function register(RegisterRequest $request)
    {
        try{
            $validated = $request->validated();

            $name_file = $request->foto_ktp->hashName();
            $request->foto_ktp->move('img/foto-ktp', $name_file);
            $validated['foto_ktp'] = $name_file;
            $validated['password'] = bcrypt($request->password);
            User::create($validated);

            return redirect()->route('login')->with('alert', [
                    'status' => 'success',
                    'pesan'  => 'Pendaftaran berhasil! Silakan masuk untuk mengisi survey!'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('register')->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat mendaftarkan data. Silakan coba lagi!'
            ]);
        }
    }

    function logout(\Illuminate\Http\Request $request)
    {
        \Illuminate\Support\Facades\Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('beranda')->with('alert', [
            'status' => 'success',
            'pesan'  => 'Anda berhasil keluar!'
        ]);
    }
}
