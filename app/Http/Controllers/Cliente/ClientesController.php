<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//Para hacer  posible  registro
use App\Models\Mproducto;
use App\Models\Mcategoria;
use App\Models\Estado;
use App\Models\Marca;
use App\Models\FacturaVenta;
use App\Models\ItemVenta;

class ClientesController extends Controller
{
    public function listaproducto(){
      
        $productos = Mproducto::all();
        $categorias=Mcategoria::all();
        $facturas = FacturaVenta::all();
        $cont=count($facturas);
        return view('cliente.listap', compact('productos', 'categorias', 'cont'));
        
    }
    public function detalle(Request $request, $Idproducto){    
        $productos = Mproducto::findOrFail($Idproducto);
        return view('cliente.listapdet', compact('productos'));
    }
    public function listar($Idcategoria){
        $productos = Mproducto::where('Idcat', 'like',$Idcategoria)
        ->get(); 
        $categorias=Mcategoria::all();
        return view('cliente.listap', compact('productos', 'categorias'));        
    }
    public function buscar(Request $request){
        $nombre = $request->input('consultaPro');
        $productos = Mproducto::where('Nombrepro', 'like','%'.$nombre.'%')
        ->get(); 
        $categorias=Mcategoria::all();
        $cont=count($facturas);
        return view('cliente.listap', compact('productos', 'categorias', 'cont'));
            
    }
    public function agregar(Request $request){
        $facturaven = new FacturaVenta();
        $facturaven->Idfacven  = $request->input('fac');
        $facturaven->Idpersona = $request->input('usuario');
        $facturaven->Fechafacven = $request->input('fecha');
        $facturaven->Totalfacven = 0.0;
        $facturaven->estadofacv = 1;
        $facturaven->save();

        $facturaven = FacturaVenta::findOrFail($request->input('fac'));
    

        $total=$facturaven->Totalfac;
        $itemven = new ItemVenta; 
        $itemven['Idfacven'] = $request->input('fac');
        $itemven['Idpro'] = $request->input('producto');
        $itemven['Cantidaditem'] = $request->input('cantidad');
        $itemven['Precioitem']=$request->input('precio');
        $itemven['Totalitem'] = $request->input('cantidad')*$request->input('precio'); 
        $total=$total+($request->input('cantidad')*$request->input('precio'));
        $itemven->save();
            
        $facturaven = FacturaVenta::findOrFail($request->input('fac'));
        $facturaven->Totalfac = $total;
        $facturaven->save();
        return redirect('cliente/lista');
    }
}
