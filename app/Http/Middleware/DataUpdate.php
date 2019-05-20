<?php

namespace App\Http\Middleware;
use App\User;
use App\Horaire;
use Closure;


class DataUpdate
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
        /* $horaires = Horaire::all();

        foreach ($horaires as $horaire ) {

        } */


        return $next($request);
    }
}
