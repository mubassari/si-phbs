<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Models\Preferensi;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index()
    {
        $list_survey = Survey::withCount('preferensi')->latest()->get();
        return view('pages.survey.index', compact('list_survey'));
    }

    public function create()
    {
        return view('pages.survey.create');
    }

    public function store(SurveyRequest $request)
    {
        $validated = $request->validated();
        $survey = Survey::create(['pertanyaan' => $validated['pertanyaan']]);
        for ($i = 0; $i < 3; $i++) {
            Preferensi::create([
                'survey_id' => $survey->id,
                'jawaban' => $validated['jawaban'][$i],
                'nilai' => $validated['nilai'][$i]
            ]);
        }
        return redirect(route('survey.index'))->with('success', 'Penambahan data survey berhasil disimpan.');
    }

    public function edit(Survey $survey)
    {
        $arr_jawaban = $survey->preferensi->pluck('jawaban')->toArray();
        $arr_nilai = $survey->preferensi->pluck('nilai')->toArray();
        return view('pages.survey.edit', compact('survey', 'arr_jawaban', 'arr_nilai'));
    }

    public function update(SurveyRequest $request, Survey $survey)
    {
        $validated = $request->validated();
        $survey->update(['pertanyaan' => $validated['pertanyaan']]);
        Preferensi::where('survey_id', $survey->id)->delete();
        for ($i = 0; $i < 3; $i++) {
            Preferensi::create([
                'survey_id' => $survey->id,
                'jawaban' => $validated['jawaban'][$i],
                'nilai' => $validated['nilai'][$i]
            ]);
        }
        return redirect(route('survey.index'))->with('success', 'Perubahan data survey berhasil disimpan.');
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect(route('survey.index'))->with('success', 'Data survey berhasil dihapus.');
    }
}
