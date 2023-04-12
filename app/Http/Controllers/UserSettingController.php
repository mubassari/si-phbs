<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserSettingController extends Controller
{
    public function viewFormProfile()
    {
        $user = auth()->user();
        return view('pages.account.profile', compact('user'));
    }

    public function updateProfil(UserRequest $request, User $user)
    {
        DB::beginTransaction();
        try {
            $validated = $request->safe()->except('password');
            $user->fill($validated);

            if ($request->hasFile('foto_ktp')){
                $name_file = $request->foto_ktp->hashName();
                if (!$request->foto_ktp->move('img/foto-ktp', $name_file)) {
                    return back()->withInput()->with('alert', [
                        'status' => 'danger',
                        'pesan'  => 'Terjadi kesalahan saat mengunggah gambar. Silakan coba lagi!'
                    ]);
                }

                if (Storage::exists("img/foto-ktp/$user->foto_ktp") && !Storage::delete("img/foto-ktp/$user->foto_ktp")){
                    return back()->withInput()->with('alert', [
                        'status' => 'danger',
                        'pesan'  => 'Terjadi kesalahan saat menghapus gambar lama. Silakan coba lagi!'
                   ]);
                }

                $user->foto_ktp = $name_file;
            }
            
            $user->save();

            DB::commit();

            return redirect()->route('profile.detail')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil memperbarui data Profil Anda!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('profile.detail')->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi!'
            ]);
        }
    }

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
