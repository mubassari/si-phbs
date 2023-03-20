<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indikator;

class IndikatorController extends Controller
{
    public function list()
    {
        return view('pages.indikator.index');
    }

    public function buat()
    {
        return view('pages.indikator.buat');
    }

    public function tampil(Indikator $indikator)
    {
        return view('pages.indikator.tampil');
    }

    public function ubah(Indikator $indikator)
    {
        return view('pages.indikator.ubah');
    }
}
