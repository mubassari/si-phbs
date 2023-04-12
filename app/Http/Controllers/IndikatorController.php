<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\IndikatorRequest;
use App\Models\Indikator;
use Illuminate\Support\Facades\Storage;

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
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $indikator = Indikator::create($validated);

            if ($request->hasFile('foto')){
                $name_file = $request->foto->hashName();
                if (!$request->foto->move('img/foto-indikator', $name_file)) {
                    return back()->withInput()->with('alert', [
                        'status' => 'danger',
                        'pesan'  => 'Terjadi kesalahan saat mengunggah gambar. Silakan coba lagi!'
                    ]);
                }

                $indikator->foto = $name_file;
            }
            $indikator->isi = preg_replace("/\r|\n|\r\n|&nbsp;/", "", $request->isi);
            $indikator->save();

            DB::commit();

            return redirect()->route('indikator.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil menyimpan data Indikator!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
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
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $indikator->fill($validated);

            if ($request->hasFile('foto')){
                $name_file = $request->foto->hashName();
                if(!$request->foto->move('img/foto-indikator', $name_file)) {
                    return back()->withInput()->with('alert', [
                        'status' => 'danger',
                        'pesan'  => 'Terjadi kesalahan saat mengunggah gambar. Silakan coba lagi!'
                    ]);
                }

                if (Storage::exists("img/foto-ktp/$indikator->foto") && !Storage::delete("img/foto-ktp/$indikator->foto")){
                    return back()->withInput()->with('alert', [
                        'status' => 'danger',
                        'pesan'  => 'Terjadi kesalahan saat menghapus gambar lama. Silakan coba lagi!'
                    ]);
                }

                $indikator->foto = $name_file;
            }
            
            $indikator->save();

            DB::commit();

            return redirect()->route('indikator.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil memperbarui data Indikator!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi!'
            ]);
        }
    }

    public function destroy(Indikator $indikator)
    {
        DB::beginTransaction();
        try {
            $indikator->delete();

            if (Storage::exists("img/foto-ktp/$indikator->foto_ktp") && !Storage::delete('img/foto-ktp/' . $indikator->foto_ktp)) {
                return back()->withInput()->with('alert', [
                    'status' => 'danger',
                    'pesan'  => 'Terjadi kesalahan saat menghapus gambar. Silakan coba lagi!'
                ]);
            }

            DB::commit();

            return redirect()->route('indikator.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil menghapus data Indikator!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat menghapus data. Silakan coba lagi!'
            ]);
        }
    }
}
