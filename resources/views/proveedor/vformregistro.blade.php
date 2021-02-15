@extends('master')
@section('contenido') 
    <br>
    <h1 class="text-center">Formulario de registro Proveedor</h1>

    <div class="container">
        <form action="{{url('proveedor/registro')}}" method="POST" >
            @csrf
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" name="idprove" placeholder="Id Del Proveedor" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" name="nomprove" placeholder="Nombre Del Proveedor" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>  
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" name="direccionprove" placeholder="Direccion del Proveedor" aria-label="Username" aria-describedby="basic-addon1" required> 
            </div>
            <br>  
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="email" class="form-control" name="correoprove" placeholder="Coreo Del Proveedor" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>  
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">#</span>
                </div>
                <input type="number" class="form-control" name="telefonoprove" placeholder="Telefono Proveedor" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <br>
        

            <br><br>
            <button type="submit" class="btn btn-success" onclick="return alerta()">Registrar</button>
            <a href="{{url('proveedor/lista')}}"  class="btn btn-info" >Cancelar</a>
            <br><br>

        </form>
    </div>
@stop
