<?php

namespace App\Http\Controllers\FACTURA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Para hacer las consultas
use Illuminate\Support\Facades\DB;

//Para hacer  posible  registro
use App\Models\Mproveedor;
use App\Models\Mproducto;
use App\Models\Mfactura;
use App\Models\Mitem;


class FacturaController extends Controller
{
    //
    public function formfactura(){
        $proveedores = DB::table('proveedor')->get();
        $productos = Mproducto::all();
        return view('factura.vformregistro', compact('proveedores','productos'));       
    }
    public function registro(Request $request){
        $facturaCom = new Mfactura();
        $facturaCom->Idfactura  = $request->input('idfac');
        $facturaCom->Idprove = $request->input('proveedor');
        $facturaCom->Fechafac = $request->input('fecha');
        $facturaCom->Totalfac = 0.0;
        $facturaCom->estadofac = 1;
        $facturaCom->save();

        $cont = count($request->cantidad);
        $total=0;
		for($i = 0; $i < $cont; $i++){
            if($request->cantidad[$i] == NULL){
            
            }else{
                $itemcom = array();
                $itemcom = new Mitem; 
                $itemcom['Idpro'] = $request->idpro[$i];
                $itemcom['Idfac'] = $request->input('idfac');
                $itemcom['Numeroitem'] = 1;
                $itemcom['Cantidaditem']=$request->cantidad[$i];
                $itemcom['Precioitem']=$request->precio[$i];
                $itemcom['Totalitem'] = $request->cantidad[$i]*$request->precio[$i]; 
                $total=$total+($request->cantidad[$i]*$request->precio[$i]);
                $itemcom->save();
            }
        }
        $facturaCom = Mfactura::findOrFail($request->input('idfac'));
        $facturaCom->Totalfac = $total;
        $fefacturaComcha->save();
        return redirect('factura/lista');
    }
    public function listafactura(){    
        $facturas = Mfactura::all();
        return view('factura.vlistafactura', ['facturas' => $facturas]);
    }
    
    public function eliminar($Idfactura){
        $facttura = Mfactura::findOrFail($Idfactura);
        $facttura->estadofac = 2;
        $facttura->save();
        return redirect('factura/lista');
        
    }
    public function activar($Idfactura){
        $facttura = Mfactura::findOrFail($Idfactura);
        $facttura->estadofac = 1;
        $facttura->save();
        return redirect('factura/lista');
    }
    public function facdetalle(Request $request, $Idfactura){    
        $facturas = Mfactura::findOrFail($Idfactura);

        $items = Mitem::join('factura','Idfactura', '=', 'Idfac')
        ->where('Idfactura', 'like', $Idfactura)->get();
        return view('factura.vlistafacturadet', compact('facturas', 'items'));
    }
}
