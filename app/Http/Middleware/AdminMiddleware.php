<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Closure;

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
        if (Auth::check() && Auth::user()->type=='admin')

            return $next($request); //si esta logueado y su tipo es administrador continua



        return redirect('/');  //si no es administrador te manda al home



    }
}
