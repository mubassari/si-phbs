<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'telpon' => 'required|string|regex:"[0-9]{11,15}"|string',
            'alamat' => 'required|string',
            'foto_ktp' => 'required|image|max:4000',
        ], ['foto_ktp.required' => 'Foto ktp wajib diupload.', 'telpon.regex' => 'Format No Telpon tidak dikenali.']);
        $name_file = $request->foto_ktp->hashName();
        $validated['foto_ktp'] = $name_file;
        $validated['password'] = bcrypt(substr($request->telpon, -4, 4));
        $request->foto_ktp->move('img/foto-ktp', $name_file);
        User::create($validated);
        return redirect(route('user.index'))->with('alert-success', 'Penambahan data user berhasil disimpan.');
    }

    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'telpon' => 'required|string|regex:"[0-9]{11,15}"|string',
            'alamat' => 'required|string',
            'foto_ktp' => 'sometimes|image|max:4000',
        ], ['foto_ktp.required' => 'Foto ktp wajib diupload.', 'telpon.regex' => 'Format No Telpon tidak dikenali.']);
        if ($request->has('foto_ktp')) {
            File::delete(public_path("img/foto-ktp/$user->foto_ktp"));
            $name_file = $request->foto_ktp->hashName();
            $validated['foto_ktp'] = $name_file;
            $request->foto_ktp->move('img/foto-ktp', $name_file);
        }
        $user->update($validated);
        return redirect(route('user.index'))->with('alert-success', 'Perubahan data user berhasil disimpan.');
    }

    public function destroy(User $user)
    {
        File::delete(public_path("img/foto-ktp/$user->foto_ktp"));
        $user->delete();
        return redirect(route('user.index'))->with('alert-success', 'Data user berhasil dihapus.');
    }

    public function resetStatus(User $user)
    {
        $user->update([
            'status_partisipasi' => false,
            'status_draft' => false,
        ]);
        return redirect(route('user.index'))->with('alert-success', 'Status user berhasil direset.');
    }
}
