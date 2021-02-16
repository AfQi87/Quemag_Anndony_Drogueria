<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


//Para hacer las consultas
use Illuminate\Support\Facades\DB;

//Para hacer  posible  registro
use App\Models\Mtipo;
use App\Models\Mcategoria;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function __constructor(){
        $this->middleware('log', ['only' => ['rol']]);
    }

    public function create()
    {
        $tipos = DB::table('tipo')->first();
        return view('auth.login', ['tipos' => $tipos]);
        
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
    
        $request->authenticate();

        $request->session()->regenerate();
        if(Auth::user()->estadoUser == 1){
            if(Auth::user()->tipopro == 2){
                return redirect('/dashboard');
            }else{
                if(Auth::user()->tipopro == 1){
                    
                    return redirect('/');
                }
                
            }
        }else{
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            $categorias=Mcategoria::all();
            $aux=0;

            return view('welcome', compact('categorias', 'aux'));
        }
        
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
