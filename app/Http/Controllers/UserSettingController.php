<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class UserSettingController extends Controller
{
    public function viewFormProfile()
    {
        $user = auth()->user();
        return view('pages.account.profile', compact('user'));
    }

    public function updateProfil(UserRequest $request, User $user)
    {
        try {
            $validated = $request->validated();
            if ($request->has('foto_ktp')) {
                File::delete(public_path("img/foto-ktp/$user->foto_ktp"));
                $name_file = $request->foto_ktp->hashName();
                $validated['foto_ktp'] = $name_file;
                $request->foto_ktp->move('img/foto-ktp', $name_file);
            }
            $user->update($validated);
            return redirect()->route('profile')->with('success', 'Perubahan data anda berhasil disimpan.');
        } catch (\Exception) {
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
    }

    public function viewFormPassword()
    {
        $user = auth()->user();
        return view('pages.account.password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $validated = $request->validate([
            'password_old' => 'required',
            'password' => 'required|min:4|same:password_confirmation',
            'password_confirmation' => 'required'
        ], [], [
            'password_old' => 'Kata Sandi Lama',
            'password' => 'Kata Sandi',
            'password_confirmation' => 'Konfirmasi Kata Sandi',
        ]);
        if (password_verify($request->password_old, $user->password)) {
            $user->update([
                'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
            ]);
            return redirect(route('password'))->with('success', 'Perubahan informasi kata sandi anda berhasil disimpan.');
        }
        return redirect()->back()->withErrors(['password_old' => 'Kata sandi lama yang anda masukkan salah.']);
    }
}
