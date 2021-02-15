@extends('master')
@section('contenido') 
    <br>
    <h1 class="text-center">Formulario de Actualizar Proveedor</h1>

    <div class="container">
        <form action="{{route('actualizarProveedor', $proveedor->Idproveedor )}}" method="POST" >
            @csrf
            <br>
            <div class="input-group mb-3">
                <label class="form-control" for="idprove">ID Proveedor</label>
                <input type="text" class="form-control" name="idprove" id="idprove"value="{{$proveedor->Idproveedor}}"  aria-label="Username" aria-describedby="basic-addon1" disabled>
            </div>
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" name="nomprove" value="{{$proveedor->Nombreprove}}" placeholder="Nombre Del Proveedor" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>  
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" name="direccionprove" value="{{$proveedor->Direccionprove}}" placeholder="Direccion del Proveedor" aria-label="Username" aria-describedby="basic-addon1" required> 
            </div>
            <br>  
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="email" class="form-control" name="correoprove" value="{{$proveedor->Correoprove}}" placeholder="Coreo Del Proveedor" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>  
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">#</span>
                </div>
                <input type="number" class="form-control" name="telefonoprove" value="{{$proveedor->Telefonoprove}}" placeholder="Celular Proveedor" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <br>
            <input type="hidden" class="form-control" name="estado" value="{{$proveedor->estadoprov}}"  aria-label="Username" aria-describedby="basic-addon1" >

            <br><br>
            <button type="submit" class="btn btn-success" onclick="return alerta()">Actualizar</button>
            <a href="{{url('proveedor/lista')}}"  class="btn btn-info" >Cancelar</a>
            <br><br>

        </form>
    </div>
@stop
