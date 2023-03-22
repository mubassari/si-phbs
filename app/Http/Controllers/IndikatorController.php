<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'required|image|max:4000',
        ], ['foto.required' => 'Foto indikator wajib diupload.']);
        $name_file = $request->foto->hashName();
        $validated['foto'] = $name_file;
        $request->foto->move('img/foto-indikator', $name_file);
        Indikator::create($validated);
        return redirect(route('indikator.index'))->with('alert-success', 'Penambahan data indikator berhasil disimpan.');
    }

    public function edit(Indikator $indikator)
    {
        return view('pages.indikator.edit', compact('indikator'));
    }

    public function update(Request $request, Indikator $indikator)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'sometimes|image|max:4000',
        ]);
        if ($request->has('foto')) {
            File::delete(public_path("img/foto-indikator/$indikator->foto"));
            $name_file = $request->foto->hashName();
            $validated['foto'] = $name_file;
            $request->foto->move('img/foto-indikator', $name_file);
        }
        $indikator->update($validated);
        return redirect(route('indikator.index'))->with('alert-success', 'Perubahan data indikator berhasil disimpan.');
    }

    public function destroy(Indikator $indikator)
    {
        File::delete(public_path("img/foto-indikator/$indikator->foto"));
        $indikator->delete();
        return redirect(route('indikator.index'))->with('alert-success', 'Data indikator berhasil dihapus.');
    }
}
