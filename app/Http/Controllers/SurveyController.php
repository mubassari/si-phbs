<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $survey = Survey::create(['pertanyaan' => $validated['pertanyaan']]);

            for ($i = 0; $i < 3; $i++) {
                Preferensi::create([
                    'survey_id' => $survey->id,
                    'jawaban' => $validated['jawaban'][$i],
                    'nilai' => $validated['nilai'][$i]
                ]);
            }

            DB::commit();

            return redirect()->route('survey.index')->with('success', 'Penambahan data survey berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
    }

    public function edit(Survey $survey)
    {
        $preferensi = $survey->preferensi;
        return view('pages.survey.edit', compact('survey', 'preferensi'));
    }

    public function update(SurveyRequest $request, Survey $survey)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $survey->update(['pertanyaan' => $validated['pertanyaan']]);

            foreach ($request['id'] as $key => $preferensi_id) {
                $preferensi = Preferensi::findOrFail($preferensi_id);
                $preferensi->update([
                    'jawaban' => $validated['jawaban'][$key],
                    'nilai' => $validated['nilai'][$key]
                ]);
            }

            DB::commit();

            return redirect()->route('survey.index')->with('success', 'Perubahan data survey berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
    }

    public function destroy(Survey $survey)
    {
        try {
            $survey->delete();
            return redirect(route('survey.index'))->with('success', 'Data survey berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.']);
        }
    }
}
