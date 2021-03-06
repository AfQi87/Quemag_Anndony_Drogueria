<?php

namespace App\Http\Controllers\PRODUCTO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Para hacer las consultas
use Illuminate\Support\Facades\DB;

//Para hacer  posible  registro
use App\Models\Mproducto;
use App\Models\Mcategoria;
use App\Models\Estado;
use App\Models\Marca;

class ProductoController extends Controller
{
    //
    public function all(Request $request){
        return "hola";
        
    }
    public function buscador(Request $request){
        

        $productos = Mproducto::all(); 
        return view('factura.prueba', ['productos' => $productos]);  
        
    }

    public function formproducto(){
        $categorias = DB::table('categoria')->get();
        $marcas = DB::table('marca')->get();

        $aux=0;
        return view('producto.vformregistro', compact('categorias', 'marcas', 'aux'));
    }
    public function registro(Request $request){
        $pro=Mproducto::all();
        $cont=0;
        foreach($pro as $p){
            
            if($p->Nombrepro == $request->input('nompro') || $p->Idproducto == $request->input('idpro')){
                $cont++;
            }
            
        }
        if($cont > 0){
            $categorias = DB::table('categoria')->get();
            $marcas = DB::table('marca')->get();

            $aux=1;
            return view('producto.vformregistro', compact('categorias', 'marcas', 'aux'));
        }else{

            $producto = new Mproducto();
            $producto->Idproducto = $request->input('idpro');
            $producto->Idcat = $request->input('categoria');
            $producto->Nombrepro = $request->input('nompro');
            $producto->Descripcionpro = $request->input('descripcionpro');
            $producto->Marcapro = $request->input('marcapro');
            $producto->Cantidadpro = $request->input('cantidad');
            $producto->Preciopro = $request->input('precio');
            $producto->fotopro = $request->input('foto');
            $producto->estadopro = 1;
            $producto->save();
            return redirect('producto/lista');
        }
        
    }
    public function listaproducto(){
      
        $productos = Mproducto::all();
        return view('producto.vlistaproducto', ['productos' => $productos]);
        
    }
    public function buscar(Request $request){
        $nombre = $request->input('consultaPro');
        $productos = Mproducto::where('Nombrepro', 'like','%'.$nombre.'%')
        ->get(); 
        return view('producto.vlistaproducto', ['productos' => $productos]);        
    }
    public function formactualizar($Idproducto){
        $producto = Mproducto::findOrFail($Idproducto);

        $categorias = Mcategoria::all();
        $marcas = Marca::all();
        $aux=0;
        return view('producto.vformactualizar', compact('producto','categorias','marcas','aux'));
        
    }
    public function actualizar(Request $request, $Idproducto){
        
        $pro=Mproducto::all();
        $cont=0;
        foreach($pro as $p){
            if($p->Idproducto != $Idproducto){
                if($p->Nombrepro == $request->input('nompro')){
                    $cont++;
                }
            }
        }
        if($cont > 0){
            $producto = Mproducto::findOrFail($Idproducto);

            $categorias = Mcategoria::all();
            $marcas = Marca::all();
            $aux=1;
            return view('producto.vformactualizar', compact('producto','categorias','marcas','aux'));
        }else{
            $producto = Mproducto::findOrFail($Idproducto);
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
        
        
        
    }
    public function eliminar($Idproducto){
        $producto = Mproducto::findOrFail($Idproducto);
        $producto->estadopro = 2;
        $producto->save();
        return redirect('producto/lista');
        
    }
    public function activar($Idproducto){
        $producto = Mproducto::findOrFail($Idproducto);
        $producto->estadopro = 1;
        $producto->save();
        return redirect('producto/lista');
        
    }
    


}
