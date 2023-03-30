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

    public function review(User $user)
    {
        // $list_user = User::has('tinjauan')->withCount('tinjauan')->latest()->paginate(5);
        // $survey_count = Survey::count();
        $user_data = collect([$user])->transform(function($data) {
            $survey_tinjauan = [];
            foreach ($data->tinjauan->sortBy(function($tinjauan) {
                return $tinjauan->survey_id;
            }) as $detail) {
                array_push($survey_tinjauan, [
                    'pertanyaan' => $detail->survey->pertanyaan,
                    'jawaban'    => $detail->preferensi->jawaban,
                ]);
            }

            $datas = [
                'id' => $data->id,
                'nama' => $data->nama,
                'tinjauan' => $survey_tinjauan
            ];

            return $datas;
        })->first();

        return view('pages.tinjauan.review', compact('user_data'));
    }
}
