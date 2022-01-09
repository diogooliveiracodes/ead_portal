<?php

namespace App\Http\Middleware;

use App\Models\Academico\Matricula;
use Closure;

class VerifyPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Matricula::where('user_id', Auth::user()->id)->first();
        return $next($request);
    }
}
