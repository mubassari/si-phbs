<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;

class TinjauanController extends Controller
{
    public function index()
    {
        $list_user = User::has('tinjauan')->withCount('tinjauan')->latest()->paginate(5);
        $survey_count = Survey::count();
        return view('pages.tinjauan.index', compact('list_user', 'survey_count'));
    }
}
