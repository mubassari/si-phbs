<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
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

            return redirect()->route('user.index')->with('success', 'Penambahan data user berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
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
            return redirect()->route('user.index')->with('success', 'Perubahan data user berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            File::delete(public_path("img/foto-ktp/$user->foto_ktp"));

            return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menghapus data. Silakan coba lagi.']);
        }
    }

    public function resetStatus(User $user)
    {
        $user->update([
            'status_partisipasi' => false,
            'status_draft' => false,
        ]);
        return redirect(route('user.index'))->with('success', 'Status user berhasil direset.');
    }
}
