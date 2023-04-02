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

        if(!(Survey::count() > 0)  && $ability === "isi_survey") {
            return redirect()->route('beranda')->with('alert', [
                'status' => 'warning',
                'pesan'  => 'Survey belum tersedia, harap coba lagi nanti!'
            ]);
        }

        return $next($request);
    }
}
