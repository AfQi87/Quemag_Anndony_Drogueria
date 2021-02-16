<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Mtipo;
use App\Models\Mproveedor;
use App\Models\Mestado;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioControlle extends Controller
{
    public function formusuario(){
        $aux=0;
        $tipos = Mtipo::all();
        return view('usuario.vformregistro', compact('tipos', 'aux'));
    }
    public function registro(Request $request){

        $user = User::all();
        $cont=0;
        foreach($user as $u){
            if($u->id == $request->input('id') || $u->email == $request->input('email')){
                $cont++;
            }
        }
        if($cont >0){
            $aux=1;
            $tipos = Mtipo::all();
            return view('usuario.vformregistro', compact('tipos', 'aux'));
        }else{
            $usuarios = new User();
            $usuarios->id = $request->input('id');
            $usuarios->name = $request->input('name');
            $usuarios->email = $request->input('email');
            $usuarios->tipopro = $request->input('tipopro');
            $usuarios->estadoUser = 1;
            $usuarios->password = Hash::make($request->password);
            $usuarios->save();
            return redirect('usuario/lista');
        }
        
          

    }
    public function listausuario(){
        $usuarios = User::all();
        return view('usuario.vlistausuario', compact('usuarios'));
        
    }
    
    public function buscar(Request $request){
        $nombre = $request->input('consultaUsu');
        $usuarios = User::where('name', 'like','%'.$nombre.'%')->get();
        return view('usuario.vlistausuario', ['usuarios' => $usuarios]);   
    }

    public function formactualizar($id){
        $usuario = User::findOrFail($id);
        $tipos =Mtipo::all();
        return view('usuario.vformactualizar', compact('usuario','tipos'));
    }

    public function actualizar(Request $request, $id){
        $usuarios = User::findOrFail($id);

       
        $usuarios->name = $request->input('name');
        $usuarios->email = $request->input('email');
        $usuarios->tipopro = $request->input('tipopro');
        $usuarios->estadoUser = $request->input('estado');;
        $usuarios->password = Hash::make($request->password);
        $usuarios->save();
        return redirect('usuario/lista');
        
    }
    public function eliminar($id){
        $usuario = User::findOrFail($id);
        $usuario->estadoUser = 2;
        $usuario->save();
        return redirect('usuario/lista');
        
    }
    public function activar($id){
        $usuario = User::findOrFail($id);
        $usuario->estadoUser = 1;
        $usuario->save();
        return redirect('usuario/lista');
        
    }
}
