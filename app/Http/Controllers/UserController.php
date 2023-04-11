<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $validated['password'] = bcrypt($request->password);
            $user = User::create($validated);

            $name_file = $request->foto_ktp->hashName();
            if (!$request->foto_ktp->move('img/foto-ktp', $name_file)) {
                return back()->withInput()->with('alert', [
                    'status' => 'danger',
                    'pesan'  => 'Terjadi kesalahan saat mengunggah gambar. Silakan coba lagi!'
                ]);
            }
            $user->foto_ktp = $name_file;
            $user->save();

            DB::commit();

            return redirect()->route('user.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil menyimpan data User!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
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
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $validated['password'] = bcrypt($request->password);
            $user->fill($validated);

            $name_file = $request->foto_ktp->hashName();
            if ($request->hasFile('foto_ktp') && !$request->foto_ktp->move('img/foto-ktp', $name_file)) {
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
            $user->save();

            DB::commit();

            return redirect()->route('user.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil memperbarui data User!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi!'
            ]);
        }
    }

    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->delete();

            if (Storage::exists("img/foto-ktp/$user->foto_ktp") && !Storage::delete('img/foto-ktp/' . $user->foto_ktp)) {
                return back()->withInput()->with('alert', [
                    'status' => 'danger',
                    'pesan'  => 'Terjadi kesalahan saat menghapus gambar. Silakan coba lagi!'
                ]);
            }

            DB::commit();

            return redirect()->route('users.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Data pengguna berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat menghapus data pengguna. Silakan coba lagi!'
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
            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat memperbarui status <strong>'.$user->nama.'</strong>. Silakan coba lagi!'
            ]);
        }
    }

    public function verify(Request $request, User $user)
    {
        try {
            $user->update([
                'status_verifikasi' => true,
            ]);

            return redirect()->back()->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil memverifikasi <strong>'.$user->nama.'</strong>!'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat  memverifikasi <strong>'.$user->nama.'</strong>. Silakan coba lagi!'
            ]);
        }
    }
}
