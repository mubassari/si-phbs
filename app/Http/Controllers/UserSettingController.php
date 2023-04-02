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
        try {
            $validated = $request->safe()->except('password');
            if ($request->has('foto_ktp')) {
                File::delete(public_path("img/foto-ktp/$user->foto_ktp"));
                $name_file = $request->foto_ktp->hashName();
                $validated['foto_ktp'] = $name_file;
                $request->foto_ktp->move('img/foto-ktp', $name_file);
            }
            $user->update($validated);

            return redirect()->route('profile.detail')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil memperbarui data Profil Anda!'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('profile.detail')->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi!'
            ]);
        }
    }

    // public function viewFormPassword()
    // {
    //     $user = auth()->user();
    //     return view('pages.account.password', compact('user'));
    // }

    public function updatePassword(ChangePasswordRequest $request, User $user)
    {
        try{
            $validated = $request->validated();
            $user->update([
                'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
            ]);

            return redirect()->route('profile.detail')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil memperbarui Kata Sandi Anda!'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi!'
            ]);
        }
    }
}
