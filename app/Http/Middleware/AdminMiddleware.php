<?php

namespace SisBezaFest\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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

        if(Auth::check() && Auth::user()->rol=='Administrador')

            return $next($request);

        return redirect('/administrador/usuario');
    }
}
