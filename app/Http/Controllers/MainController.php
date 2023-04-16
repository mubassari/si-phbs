<?php

namespace App\Http\Controllers;

use App\Models\Indikator;

class MainController extends Controller
{
    public function beranda()
    {
        $list_indikator = Indikator::latest()->get();
        return view('pages.beranda', compact('list_indikator'));
    }

    public function post($slug)
    {
        $indikator = Indikator::where('slug', $slug)->get()[0];
        return view('pages.indikator.show', compact('indikator'));
    }
}
