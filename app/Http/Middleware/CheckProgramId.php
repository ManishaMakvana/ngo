<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckProgramId
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('program_id')) {
            return redirect('/login')->withErrors('Session expired. Please log in again.');
        }

        return $next($request);
    }
}
