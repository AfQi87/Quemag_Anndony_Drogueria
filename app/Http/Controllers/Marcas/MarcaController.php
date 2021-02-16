<?php

namespace App\Http\Controllers\Marcas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//Para hacer  posible  registro
use App\Models\Mproducto;
use App\Models\Mcategoria;
use App\Models\Estado;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function formmarca(){
        $aux=0;
        return view('Marcas.vformmarcas', compact('aux'));
    }

    public function regmarca(Request $request){
        $mar=Marca::all();
        $cont=0;
        foreach($mar as $c){
            if($c->descripcionmarca == $request->input('nombre')){
                $cont++;
            }
        }
        if($cont>0){
            $aux=1;
            return view('Marcas.vformmarcas', compact('aux'));
        }else{
            $marca = new Marca();
        
            $marca->descripcionmarca = $request->input('nombre');
            $marca->estadomarca = 1;

            $marca->save();
            return redirect('marca/lista');
        }
        
    }
    public function listamarca(){
      
        $marca =Marca::all();
        return view('Marcas.vlistamarca', ['marca' => $marca]);
        
    }

    public function formactualizar($idmarca){
        
        
        $marca = Marca::findOrFail($idmarca);
        $aux=0;
        return view('Marcas.vformactualizar', compact('marca','aux'));
        
    }
    public function actualizar(Request $request, $idmarca){

        $cat=Marca::all();
        $cont=0;

        foreach($cat as $c){
            if($c->idmarca != $idmarca){
                if($c->descripcionmarca == $request->input('nombre')){
                    $cont++;
                }
            }
            
        }

        if($cont > 0){
            $aux=1;
            $marca = Marca::findOrFail($idmarca);
       
            return view('Marcas.vformactualizar', compact('marca', 'aux'));
        }else{
            $marca = Marca::findOrFail($idmarca);
            $marca->descripcionmarca = $request->input('nombre');
        

            $marca->save();
            return redirect('marca/lista');
        }
        
        
    }

    public function eliminar($idmarca){
        $marca = Marca::findOrFail($idmarca);
        $marca->estadomarca = 2;
        $marca->save();
        return redirect('marca/lista');
        
    }
    public function activar($idmarca){
        $marca = Marca::findOrFail($idmarca);
        $marca->estadomarca = 1;
        $marca->save();
        return redirect('marca/lista');
        
    }



}
