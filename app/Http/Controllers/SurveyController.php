<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\User;

class SurveyController extends Controller
{
    public function list()
    {
        return view('pages.survey.index');
    }

    public function buat()
    {
        return view('pages.survey.buat');
    }

    public function isi()
    {
        return view('pages.survey.isi');
    }

    public function ubah(Survey $survey)
    {
        return view('pages.survey.ubah');
    }

    public function detail(User $user)
    {
        return view('pages.survey.detail');
    }
}
