<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MainController extends Controller
{
    public function beranda()
    {
        $list_indikator = Indikator::latest()->get();
        return view('pages.beranda', compact('list_indikator'));
    }

    public function post($slug)
    {
        try {
            $indikator = Indikator::where('slug', $slug)->firstOrFail();
            return view('pages.indikator.show', compact('indikator'));
        } catch (ModelNotFoundException $exception) {
            return redirect()->intended(route('beranda'))->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Artikel yang Anda ingin akses saat ini tidak atau belum tersedia!'
            ]);
        }
    }
}
