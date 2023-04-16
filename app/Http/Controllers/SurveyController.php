<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\SurveyRequest;
use App\Models\Preferensi;
use App\Models\Survey;
use App\Models\Tinjauan;
use App\Models\User;

class SurveyController extends Controller
{
    public function index()
    {
        $list_survey = Survey::withCount('preferensi')->latest()->get();
        return view('pages.survey.index', compact('list_survey'));
    }

    public function create()
    {
        $preferensi = collect([['id' => 0, 'jawaban' => '', 'nilai' => 0]]);
        return view('pages.survey.create', compact('preferensi'));
    }

    public function store(SurveyRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $survey = Survey::create(['pertanyaan' => $validated['pertanyaan']]);

            foreach ($validated['preferensi'] as $value) {
                Preferensi::create([
                    'survey_id' => $survey->id,
                    'jawaban'   => $value['jawaban'],
                    'nilai'     => $value['nilai']
                ]);
            }

            DB::commit();

            return redirect()->route('survey.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil menyimpan data Survey!'
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi!'
            ]);
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

            Preferensi::where('survey_id', $survey->id)->delete();
            foreach ($validated['preferensi'] as $value) {
                Preferensi::create([
                    'survey_id' => $survey->id,
                    'jawaban'   => $value['jawaban'],
                    'nilai'     => $value['nilai']
                ]);
            }

            DB::commit();

            return redirect()->route('survey.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil memperbarui data Survey!'
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi!'
            ]);
        }
    }

    public function destroy(Survey $survey)
    {
        try {
            $survey->delete();
            return redirect()->route('survey.index')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil menghapus data Survey!'
            ]);
        } catch (\Exception $e) {
            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan saat menghapus data. Silakan coba lagi!'
            ]);
        }
    }

    public function viewSurveySaya()
    {
        $user = auth()->user();
        $list_survey = Survey::withCount('preferensi')->get();
        return view('pages.survey.saya', compact('list_survey', 'user'));
    }
    public function viewFormSurvey()
    {
        $user = auth()->user();
        $list_survey = Survey::withCount('preferensi')->get();
        $list_tinjauan = Tinjauan::where('user_id', $user->id)->get();
        return view('pages.survey.isi', compact('list_survey', 'list_tinjauan'));
    }

    public function kirimSurvey(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_id = auth()->user()->id;
            Tinjauan::where('user_id', $user_id)->delete();

            foreach ($request['jawaban'] as $survey_id => $preferensi_id) {
                Tinjauan::create([
                    'user_id' => $user_id,
                    'preferensi_id' => $preferensi_id,
                    'survey_id' => $survey_id
                ]);
            }

            User::find($user_id)->update([
                'status_draft'       => $request->has('draf'),
                'status_partisipasi' => true
            ]);

            DB::commit();

            if ($request->has('draf')) {
                return redirect()->route('survey.isi')->with('alert', [
                    'status' => 'secondary',
                    'pesan'  => 'Anda berhasil mengirim data Survey sebagai <strong>draf</strong>. Data ini tidak akan kami proses!'
                ]);
            }

            return redirect()->route('survey.saya')->with('alert', [
                'status' => 'success',
                'pesan'  => 'Anda berhasil mengirim data Survey!'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with('alert', [
                'status' => 'danger',
                'pesan'  => 'Terjadi kesalahan pada saat mengirim data. Silakan coba lagi!'
            ]);
        }
    }
}
