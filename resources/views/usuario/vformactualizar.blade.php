@extends('master')
@section('contenido') 
    <br>
    <h1 class="text-center">Actualizar Usuario</h1>

    <div class="container">
        <form action="{{route('actualizarUsuario', $usuario->id )}}" method="POST" >
            @csrf
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Id Usuario</span>
                </div>
                <input type="number" class="form-control" name="id" value="{{$usuario->id}}" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Nombre Del Usuario</span>
                </div>
                <input type="text" class="form-control" name="name" value="{{$usuario->name}}" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>  
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Correo Usuario</span>
                </div>
                <input type="email" class="form-control" name="email" value="{{$usuario->email}}"  aria-label="Username" aria-describedby="basic-addon1" required>
            </div> 

            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Contraseña</span>
                </div>
                <input type="password" class="form-control" name="password" value="{{$usuario->password}}" aria-label="Username" aria-describedby="basic-addon1" required> 
            </div> 
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Conformar contraseña</span>
                </div>
                <input type="password" class="form-control" name="password_confirmation" type="password" data-type="password" value="{{$usuario->password}}" aria-label="Username" aria-describedby="basic-addon1" required> 
            </div> 
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="tipopro">Tipo</label>   
                </div>
                <select class="custom-select" id="tipopro" name="tipopro" required>
                    <option value="{{$usuario->tipopro}}" >{{$usuario->tipos->descripciontipo}}</option>
                    @foreach($tipos as $c)
                        <option value="{{$c->idtipo}}">{{$c->descripciontipo}}</option>
                    @endforeach
                </select>
            </div>       
            <input type="hidden" class="form-control" name="estado" value="{{$usuario->estadoUser}}"  aria-label="Username" aria-describedby="basic-addon1" >
            <br><br>
            <button type="submit" class="btn btn-success" onclick="return alerta()">Actualizar</button>
            <a href="{{url('usuario/lista')}}"  class="btn btn-danger" >Cancelar</a>
            <br><br>

        </form>
    </div>
@stop
