<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $list_user = User::latest()->paginate(5);
        return view('pages.user.index', compact('list_user'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(UserRequest $request)
    {
        try {
            $validated = $request->validated();
            $name_file = $request->foto_ktp->hashName();
            $validated['foto_ktp'] = $name_file;
            $validated['password'] = bcrypt($validated['password']);
            User::create($validated);

            $request->foto_ktp->move('img/foto-ktp', $name_file);

            return redirect()->route('user.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil menyimpan data User!'
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi!'
            ]);
        }
    }

    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
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

            return redirect()->route('user.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil memperbarui data User!'
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi!'
            ]);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            File::delete(public_path("img/foto-ktp/$user->foto_ktp"));

            return redirect()->route('user.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil menghapus data User!'
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat menghapus data. Silakan coba lagi!'
            ]);
        }
    }

    public function updateStatus(Request $request, User $user)
    {
        try {
            $user->update([
                'status_verifikasi' => $request->has('status_verifikasi'),
                'status_partisipasi' => $request->has('status_partisipasi'),
                'status_draft' => $request->has('status_draft'),
                'catatan_admin' => $request->catatan_admin,
            ]);

            return redirect()->route('user.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil memperbarui data Status User!'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi!'
            ]);
        }
    }
}
