<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Mcategoria;
use Illuminate\Support\Facades\Auth;

class roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->tipopro == 1){
            return $next($request);
        }else{
            return redirect('/dashboard');
        }
    }
}
