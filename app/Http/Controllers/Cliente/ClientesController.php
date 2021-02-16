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
use Illuminate\Support\Facades\Auth;

class ClientesController extends Controller
{
    public function listaproducto(){
      
        $productos = Mproducto::all();
        $categorias=Mcategoria::all();
        $facturas = FacturaVenta::all();
        $cont=count($facturas);

        $factura =FacturaVenta::latest('Idfacven', 'desc')
        ->first();
        if($cont > 0){
            if($factura->estadofacv == 2){
                $car=1;
            }else{
                $car=2;
            }
    
            if($car == 1){
                $aux=$cont;
            }else{
                if($cont <= 0){
                    $aux=1;
                }else{
                    $aux=$cont+1;
                }
            }
        }else{
            $car=0;
            $aux=1;
        }
        $items = ItemVenta::where('Idfacven', 'like',  $aux)->get();


        return view('cliente.listap', compact('productos', 'categorias', 'aux', 'car', 'items', 'factura'));
        
    }
    public function detalle(Request $request, $Idproducto){    
        $productos = Mproducto::findOrFail($Idproducto);
        return view('cliente.listapdet', compact('productos'));
    }
    public function listar($Idcategoria){
        $productos = Mproducto::where('Idcat', 'like',$Idcategoria)
        ->get(); 
        $categorias=Mcategoria::all();
        $facturas = FacturaVenta::all();
        $cont=count($facturas);
        $factura =FacturaVenta::latest('Idfacven', 'desc')
        ->first();

        if($cont > 0){
            if($factura->estadofacv == 2){
                $car=1;
            }else{
                $car=2;
            }
    
            if($car == 1){
                $aux=$cont;
            }else{
                if($cont <= 0){
                    $aux=1;
                }else{
                    $aux=$cont+1;
                }
            }
        }else{
            $car=0;
            $aux=1;
        }
        $items = ItemVenta::where('Idfacven', 'like',  $aux)->get();


        return view('cliente.listap', compact('productos', 'categorias', 'aux', 'car', 'items', 'factura'));
                
    }
    public function buscar(Request $request){
        $nombre = $request->input('consultaPro');
        $productos = Mproducto::where('Nombrepro', 'like','%'.$nombre.'%')
        ->get(); 
        $categorias=Mcategoria::all();
        $facturas = FacturaVenta::all();
        $cont=count($facturas);
        $factura =FacturaVenta::latest('Idfacven', 'desc')
        ->first();
        if($cont > 0){
            if($factura->estadofacv == 2){
                $car=1;
            }else{
                $car=2;
            }
    
            if($car == 1){
                $aux=$cont;
            }else{
                if($cont <= 0){
                    $aux=1;
                }else{
                    $aux=$cont+1;
                }
            }
        }else{
            $car=0;
            $aux=1;
        }
        $items = ItemVenta::where('Idfacven', 'like',  $aux)->get();


        return view('cliente.listap', compact('productos', 'categorias', 'aux', 'car', 'items', 'factura'));
    }
    public function agregar(Request $request){

        if($request->input('car') == 2 || $request->input('car') == 0){
            $facturaven = new FacturaVenta();
            $facturaven->Idfacven  = $request->input('fac');
            $facturaven->Idpersona = $request->input('usuario');
            $facturaven->Fechafacven = $request->input('fecha');
            $facturaven->Totalfacven = 0.0;
            $facturaven->estadofacv = 2;
            $facturaven->save();
        }
        
        $facturaven = FacturaVenta::findOrFail($request->input('fac'));
        $total=$facturaven->Totalfacven;

        $items = ItemVenta::where('Idfacven', 'like',  $request->input('fac'))->get();
        $sum=0;
        foreach($items as $c){
            if($c->Idpro == $request->input('producto')){
                $sum++;
            }
        }

        if($sum>0){
            $item=ItemVenta::where('Idfacven', 'like',$request->input('fac'))
            ->where('Idpro', 'like',  $request->input('producto'))->first();
            $cant=$item->Cantidaditem;
            $subt=$item->Totalitem;

            if($request->input('lado')==1){
                $items = ItemVenta::findOrFail($request->input('fac'));
                $items->where('Idpro', 'like',  $request->input('producto'))
                ->update(["Cantidaditem" => ($cant+$request->input('cantidad')), "Totalitem" => ($subt+$request->input('cantidad')*$request->input('precio'))]);
                $tot=$request->input('cantidad')*$request->input('precio');
            }else{

                $cant=$cant-$request->input('cantidad');
                
                if($cant < 0 ){
                    $cant=$cant*(-1);
                }
                $items = ItemVenta::findOrFail($request->input('fac'));
                $items->where('Idpro', 'like',  $request->input('producto'))
                ->update(["Cantidaditem" => ($request->input('cantidad')), "Totalitem" => ($subt+$cant*$request->input('precio'))]);
                $tot=$cant*$request->input('precio');
            }

            

            $total=$total+$tot;
            $items->save();

        }else{
            $itemven = new ItemVenta; 
            $itemven['Idfacven'] = $request->input('fac');
            $itemven['Idpro'] = $request->input('producto');
            $itemven['Cantidaditem'] = $request->input('cantidad');
            $itemven['Precioitem']=$request->input('precio');
            $itemven['Totalitem'] = $request->input('cantidad')*$request->input('precio'); 
            $total=$total+($request->input('cantidad')*$request->input('precio'));
            $itemven->save();
        }

        $productos = Mproducto::findOrFail($request->input('producto'));
        $aux=$productos->Cantidadpro;
        if($request->input('lado')==1){
            $productos->Cantidadpro = $aux - $request->input('cantidad');
        }else{
            $productos->Cantidadpro = $aux - $cant;
        }
        
        $productos->save();

        $facturaven->Totalfacven = $total;
        $facturaven->save();
        if($request->input('lado')==1 || $request->input('lado')==2){
           return redirect('cliente/lista'); 
        }else{
            $items=ItemVenta::where('Idfacven', 'like', $request->input('fac'))->get();
            return view('cliente/listapdet', compact('items'));
        }
        
    }



    public function eliminar($pro, $fac){


        $items=ItemVenta::where('Idfacven', 'like', $fac)
        ->where('Idpro', 'like', $pro)->first();

        $productos=Mproducto::findOrFail($pro);
        $productos->Cantidadpro=$productos->Cantidadpro+$items->Cantidaditem;
        $productos->save();

        $facturas=FacturaVenta::findOrFail($fac);
        $facturas->Totalfacven=$facturas->Totalfacven-$items->Totalitem;
        $facturas->save();

        $eliminar = ItemVenta::findOrFail($fac);
        $eliminar->where('Idpro', 'like',  $pro)
        ->delete();

        return redirect('cliente/lista');
        
    }

    public function pagar($pro, $fac){    
         
        $items=ItemVenta::where('Idfacven', 'like', $fac)->get();
        return view('cliente/listapdet', compact('items'));
    }

    public function finalizar($fac){
        $facttura = FacturaVenta::findOrFail($fac);
        $facttura->estadofacv = 1;
        $facttura->save();
        
        return redirect('cliente/lista');
    }

    public function facturalist(){
        $facturas=FacturaVenta::where('Idpersona', 'like', Auth::user()->id)->get();

        
        return view('cliente/facturalist', compact('facturas'));
    }
    public function facdetalle($Idfacven){
        $facturas=FacturaVenta::where('Idfacven', 'like', $Idfacven)->first();

        $items = ItemVenta::where('Idfacven', 'like', $Idfacven)->get();
        return view('cliente/facturalistdet', compact('facturas', 'items'));    
    }
}
