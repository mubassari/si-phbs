<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Survey;
use Illuminate\Http\Request;

class RedirectIfUnauthorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $ability)
    {
        if (!$request->user()->is_admin && $ability === "admin") {
            return redirect()->route('beranda')->with('alert', [
                'status' => 'warning',
                'pesan'  => 'Anda tidak memiliki akses ke laman ini!'
            ]);
        }

        if($ability === "isi_survey") {
            if (!(Survey::count() > 0)) {
                return redirect()->route('beranda')->with('alert', [
                    'status' => 'warning',
                    'pesan'  => 'Survey belum tersedia, harap coba lagi nanti!'
                ]);
            }
            if (!$request->user()->status_draft) {
                return redirect()->route('survey.saya')->with('alert', [
                    'status' => 'success',
                    'pesan'  => 'Anda telah mengisi survey!'
                ]);
            }
        }


        if ($request->user()->status_draft && $ability === "tampil_survey") {
                return redirect()->route('survey.isi')->with('alert', [
                    'status' => 'warning',
                    'pesan'  => 'Harap isi survey Anda terlebih dahulu!'
                ]);
        }

        if (($ability === "isi_survey" || $ability === "tampil_survey") && !$request->user()->status_verifikasi) {
            return redirect()->route('beranda')->with('alert', [
                'status' => 'warning',
                'pesan'  => 'Status Anda belum terverifikasi, harap tunggu terlebih dahulu!'
            ]);
        }

        return $next($request);
    }
}
