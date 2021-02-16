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
        $tipos = Mtipo::all();
        return view('usuario.vformregistro', compact('tipos'));
    }
    public function registro(Request $request){
        $request->validate([
            'id' => 'required|string|min:8|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:4',
        ]);

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
