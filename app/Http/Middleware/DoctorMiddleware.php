<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DoctorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isDoctor()) {
            abort(403, 'Доступ запрещён. Только для врачей.');
        }
        return $next($request);
    }
}
