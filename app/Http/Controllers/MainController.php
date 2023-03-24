<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function beranda()
    {
        $list_indikator = Indikator::latest()->get();
        return view('pages.beranda', compact('list_indikator'));
    }
}
