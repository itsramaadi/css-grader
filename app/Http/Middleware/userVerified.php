<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class userVerified
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
        if(Auth::user()->role_lvl < 1){
            abort(403, 'Anda Belum diverifikasi oleh seorang pengurus. Jadi, anda belum bisa memakai fitur CSS X.');
        }else{
            return $next($request);
        }
    }
}
