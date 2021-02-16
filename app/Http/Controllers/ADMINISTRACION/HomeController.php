<?php

namespace App\Http\Controllers\ADMINISTRACION;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Para hacer las consultas
use Illuminate\Support\Facades\DB;

//Para hacer  posible  registro
use App\Models\Mtipo;
use App\Models\Mcategoria;
use App\Models\Mproducto;
class HomeController extends Controller
{
    //
    public function __constructor(){
        $this->middleware('log', ['only' => ['rol']]);
    }
    public function raiz(){
        return view('home');
    }

    public function inicio()
    {
        $i=0;
        $categorias=Mcategoria::all();
        $aux=1;
        return view('welcome', compact('categorias', 'aux'));
        
    }

    public function login()
    {
        $tipos = DB::table('tipo')->first();
        return view('auth.login', ['tipos' => $tipos]);
        
    }
}
