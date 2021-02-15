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
        return view('categoria.vformcategoria');
    }
    public function regcategoria(Request $request){
        $producto = new Mcategoria();
        $producto->Idcategoria = $request->input('idcategoria');
        $producto->Nombrecat = $request->input('nombre');
        $producto->estadocat = 1;

        $producto->save();
        return redirect('categoria/lista');
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

    public function formactualizar($Idproducto){
        $producto = Mproducto::findOrFail($Idproducto);

        $categorias = Mcategoria::all();
        $marcas = Marca::all();
        return view('producto.vformactualizar', compact('producto','categorias','marcas'));
        
    }
    public function actualizar(Request $request, $Idcategoria){
        $producto = Mproducto::findOrFail($Idcategoria);
        $producto->Idcat = $request->input('categoria');
        $producto->Nombrepro = $request->input('nompro');
        $producto->Descripcionpro = $request->input('descripcionpro');
        $producto->Marcapro = $request->input('marcapro');
        $producto->Cantidadpro = $request->input('cantidad');
        $producto->Preciopro = $request->input('precio');
        $producto->fotopro = $request->input('foto');
        $producto->estadopro = $request->input('estado');

        $producto->save();
        return redirect('producto/lista');
        
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
