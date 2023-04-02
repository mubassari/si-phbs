<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndikatorRequest;
use App\Models\Indikator;
use Illuminate\Support\Facades\File;

class IndikatorController extends Controller
{
    public function index()
    {
        $list_indikator = Indikator::latest()->get();
        return view('pages.indikator.index', compact('list_indikator'));
    }

    public function create()
    {
        return view('pages.indikator.create');
    }

    public function store(IndikatorRequest $request)
    {
        try {
            $validated = $request->validated();
            $name_file = $request->foto->hashName();
            Indikator::create($validated);

            $request->foto->move('img/foto-indikator', $name_file);

            return redirect()->route('indikator.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil menyimpan data Indikator!'
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi!'
            ]);
        }
    }

    public function edit(Indikator $indikator)
    {
        return view('pages.indikator.edit', compact('indikator'));
    }

    public function update(IndikatorRequest $request, Indikator $indikator)
    {
        try{
            $validated = $request->validated();

            if ($request->has('foto')) {
                File::delete(public_path("img/foto-indikator/$indikator->foto"));
                $name_file = $request->foto->hashName();
                $request->foto->move('img/foto-indikator', $name_file);
            }

            $indikator->update($validated);

            return redirect()->route('indikator.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil memperbarui data Indikator!'
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi!'
            ]);
        }
    }

    public function destroy(Indikator $indikator)
    {
        try {
            $indikator->delete();
            File::delete(public_path("img/foto-indikator/$indikator->foto"));

            return redirect()->route('indikator.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil menghapus data Indikator!'
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat menghapus data. Silakan coba lagi!'
            ]);
        }
    }
}
