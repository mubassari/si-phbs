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
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->is_admin) {
            return redirect()->route('beranda');
        }

        if(!(Survey::count() > 0)) {
            return redirect()->route('beranda');
        }
        
        return $next($request);
    }
}
