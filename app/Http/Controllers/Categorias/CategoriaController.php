<?php

namespace App\Http\Controllers\Categorias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Para hacer las consultas
use Illuminate\Support\Facades\DB;

//Para hacer  posible  registro
use App\Models\Mproducto;
use App\Models\Mcategoria;
use App\Models\Estado;
use App\Models\Marca;

class CategoriaController extends Controller
{
    //
    public function formcategoria(){
        $aux=0;
        return view('categoria.vformcategoria', compact('aux'));
    }
    public function regcategoria(Request $request){
        $cat=Mcategoria::all();
        $cont=0;
        foreach($cat as $c){
            if($c->nombrecat == $request->input('nombre')){
                $cont++;
            }
        }

        if($cont>0){
            $aux=1;
            return view('categoria.vformcategoria', compact('aux'));
        }else{
            $categoria = new Mcategoria();
        
            $categoria->Nombrecat = $request->input('nombre');
            $categoria->estadocat = 1;

            $categoria->save();
            return redirect('categoria/lista');
        }
        
    }
    public function listacategoria(){
      
        $categorias = Mcategoria::all();
        return view('categoria.vlistacategoria', ['categorias' => $categorias]);
        
    }



    public function buscar(Request $request){
        $nombre = $request->input('consultaCat');
        $categorias = Mcategoria::where('nombrecat', 'like','%'.$nombre.'%')
        ->get(); 
        return view('categoria.vlistacategoria', ['categorias' => $categorias]);        
    }

    public function formactualizar($Idcategoria){
        
        
        $categoria = Mcategoria::findOrFail($Idcategoria);
        $aux=0;
        return view('categoria.vformactualizar', compact('categoria','aux'));
        
    }
    public function actualizar(Request $request, $Idcategoria){

        $cat=Mcategoria::all();
        $cont=0;

        foreach($cat as $c){
            if($c->Idcategoria != $Idcategoria){
                if($c->nombrecat == $request->input('nombre')){
                    $cont++;
                }
            }
            
        }

        if($cont > 0){
            $aux=1;
            $categoria = Mcategoria::findOrFail($Idcategoria);
       
            return view('categoria.vformactualizar', compact('categoria', 'aux'));
        }else{
            $categoria = Mcategoria::findOrFail($Idcategoria);
            $categoria->nombrecat = $request->input('nombre');
        

            $categoria->save();
            return redirect('categoria/lista');
        }
        
        
    }
    public function eliminar($Idcategoria){
        $categoria = Mcategoria::findOrFail($Idcategoria);
        $categoria->estadocat = 2;
        $categoria->save();
        return redirect('categoria/lista');
        
    }
    public function activar($Idcategoria){
        $categoria = Mcategoria::findOrFail($Idcategoria);
        $categoria->estadocat = 1;
        $categoria->save();
        return redirect('categoria/lista');
        
    }
}
