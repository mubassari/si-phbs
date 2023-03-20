<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function list()
    {
        return view('pages.user.index');
    }

    public function daftar()
    {
        return view('pages.user.daftar');
    }

    public function masuk()
    {
        return view('pages.user.masuk');
    }

    public function tampil(User $user)
    {
        return view('pages.user.tampil');
    }

    public function ubah(User $user)
    {
        return view('pages.user.ubah');
    }
}
