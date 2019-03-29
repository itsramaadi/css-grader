<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class cekPengurus
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
        if(Auth::user()->role_lvl < 2){
            abort(403, 'Anda bukan seorang pengurus!');
        }else{
            return $next($request);
        }
    }
}
