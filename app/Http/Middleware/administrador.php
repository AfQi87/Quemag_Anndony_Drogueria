<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Mcategoria;
use Illuminate\Support\Facades\Auth;

class administrador
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
        if(Auth::user()->tipopro == 2){
            return $next($request);
        }else{
            return redirect('/');
        }
        
    }
}
