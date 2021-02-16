<?php

namespace App\Http\Controllers\PROVEEDOR;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Para hacer las consultas
use Illuminate\Support\Facades\DB;

//Para hacer  posible  registro
use App\Models\Mproveedor;

class ProveedorController extends Controller
{
    //
    public function formproveedor(){
        $aux=0;
        return view('proveedor.vformregistro', compact('aux'));
    }
    public function registro(Request $request){

        $prov=Mproveedor::all();
        $cont=0;
        foreach($prov as $p){
            if($p->Idproveedor == $request->input('idprove')){
                $mensaje[0]="El Id Ya Existe";
                $cont++;
            }else{
                if($p->Nombreprove == $request->input('nomprove')){
                    $mensaje[1]="El Id Ya Existe";
                    $cont++;
                }else{
                    if($p->Correoprove == $request->input('correoprove')){
                        $mensaje[2]="El Id Ya Existe";
                        $cont++;
                    }
                }
            }
        }
        if($cont>0){
            $aux=1;
            return view('proveedor.vformregistro', compact('aux'));
        }else{
            $proveedores = new Mproveedor();
            $proveedores->Idproveedor = $request->input('idprove');
            $proveedores->Nombreprove = $request->input('nomprove');
            $proveedores->Direccionprove = $request->input('direccionprove');
            $proveedores->Correoprove = $request->input('correoprove');
            $proveedores->Telefonoprove = $request->input('telefonoprove');
            $proveedores->estadoprov = 1;
            $proveedores->save();
            return redirect('proveedor/lista');
        }


        
    }
    public function listaproveedor(){
        $proveedores = Mproveedor::all();
        return view('proveedor.vlistaproveedor', ['proveedores' => $proveedores]);
    }
    
    public function buscar(Request $request){
        

        $nombre = $request->input('consultaProve');
        $proveedores = Mproveedor::where('Nombreprove', 'like','%'.$nombre.'%')->get();
        return view('proveedor.vlistaproveedor', ['proveedores' => $proveedores]);

        
    }
    public function formactualizar($Idproveedor){
        $proveedor = Mproveedor::findOrFail($Idproveedor);
        $aux=0;
        
        return view('proveedor.vformactualizar', compact('proveedor', 'aux'));
    }
    public function actualizar(Request $request, $Idproveedor){

        $prov=Mproveedor::all();
        $cont=0;
        foreach($prov as $p){
            if($p->Idproveedor != $Idproveedor){
                if($p->Nombreprove == $request->input('nomprove')){
                    $mensaje[1]="El Id Ya Existe";
                    $cont++;
                }else{
                    if($p->Correoprove == $request->input('correoprove')){
                        $mensaje[2]="El Id Ya Existe";
                        $cont++;
                    }
                }
            }
        }
        if($cont>0){
            $aux=1;
            $proveedor = Mproveedor::findOrFail($Idproveedor);
        
            return view('proveedor.vformactualizar', compact('proveedor', 'aux'));
        }else{
            $proveedores = Mproveedor::findOrFail($Idproveedor);

            $proveedores->Nombreprove = $request->input('nomprove');
            $proveedores->Direccionprove = $request->input('direccionprove');
            $proveedores->Correoprove = $request->input('correoprove');
            $proveedores->Telefonoprove = $request->input('telefonoprove');
            $proveedores->estadoprov = $request->input('estado');
            $proveedores->save();
            return redirect('proveedor/lista');
        }


        
        
    }
    public function eliminar($Idproveedor){
        $proveedor = Mproveedor::findOrFail($Idproveedor);
        $proveedor->estadoprov = 2;
        $proveedor->save();
        return redirect('proveedor/lista');
        
    }
    public function activar($Idproveedor){
        $proveedor = Mproveedor::findOrFail($Idproveedor);
        $proveedor->estadoprov = 1;
        $proveedor->save();
        return redirect('proveedor/lista');
        
    }
}
