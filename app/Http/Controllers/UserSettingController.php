<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UserSettingController extends Controller
{
    public function viewFormProfile()
    {
        $user = auth()->user();
        return view('pages.account.profile', compact('user'));
    }

    public function updateProfil(UserRequest $request, User $user)
    {
        $validated = $request->safe()->except('password');
        if ($request->has('foto_ktp')) {
            File::delete(public_path("img/foto-ktp/$user->foto_ktp"));
            $name_file = $request->foto_ktp->hashName();
            $validated['foto_ktp'] = $name_file;
            $request->foto_ktp->move('img/foto-ktp', $name_file);
        }
        $user->update($validated);
        return redirect()->route('profile')->with('success', 'Perubahan data anda berhasil disimpan.');
    }

    public function viewFormPassword()
    {
        $user = auth()->user();
        return view('pages.account.password', compact('user'));
    }

    public function updatePassword(ChangePasswordRequest $request, User $user)
    {
        $validated = $request->validated();
        if (password_verify($request->kata_sandi_lama, $user->password)) {
            $user->update([
                'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
            ]);
            return redirect(route('password'))->with('success', 'Perubahan informasi kata sandi anda berhasil disimpan.');
        }
        return redirect()->back()->withErrors(['kata_sandi_lama' => 'Kata sandi lama yang anda masukkan salah.']);
    }
}
