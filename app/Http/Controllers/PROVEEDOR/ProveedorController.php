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
        return view('proveedor.vformregistro');
    }
    public function registro(Request $request){
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
        
        return view('proveedor.vformactualizar', compact('proveedor'));
    }
    public function actualizar(Request $request, $Idproveedor){
        $proveedores = Mproveedor::findOrFail($Idproveedor);

        $proveedores->Nombreprove = $request->input('nomprove');
        $proveedores->Direccionprove = $request->input('direccionprove');
        $proveedores->Correoprove = $request->input('correoprove');
        $proveedores->Telefonoprove = $request->input('telefonoprove');
        $proveedores->estadoprov = $request->input('estado');
        $proveedores->save();
        return redirect('proveedor/lista');
        
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
