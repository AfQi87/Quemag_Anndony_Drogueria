@extends('master')
@section('contenido') 
    <br>
    <h1 class="text-center">Lista de  producto</h1>
    <br>

    <div class="container" >
        <form action="{{url('proveedor/buscar')}}" method= "POST">
            @csrf
            <div class="input-group mb-3">
                <a href="{{url('proveedor/formregistro')}}"  class="btn btn-info" >Registrar</a>
                <input type="text" style="margin-left: 700px; max-width: 200px;margin-right: 20px;" class="form-control" id="consultaProve" name="consultaProve" placeholder="Nombre Del Proveedor" aria-label="Username" aria-describedby="basic-addon1" >
                <input type="submit" class="btn btn-success" value="Consultar">
            </div> 
            
            
        
        </form>
    </div>


    <div class="container">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Direccion</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Estado</th>
                <th scope="col">Más</th>
                </tr>
            </thead>
            <tbody class="table-info">
                @foreach($proveedores as $p)
                <tr>
                <th scope="row">{{$p->Idproveedor}}</th>
                <td> {{$p->Nombreprove}}</td>
                <td> {{$p->Direccionprove}}</td>
                <td> {{$p->Correoprove}}</td>
                <td> {{$p->Telefonoprove}}</td>     
                <td> {{$p->estados->descripcionestado}}</td>
                <td> <a href="{{route('actualizarProve', $p->Idproveedor)}}"  class="btn btn-success">&#9999;</a> 
                     <a href="{{route('eliminarProve', $p->Idproveedor)}}"  class="btn btn-danger" onclick="return alerta()">&#10060;</a>
                    @if($p->estadoprov == 2)
                        <a href="{{route('activarProveedor', $p->Idproveedor)}}"  class="btn btn-warning" onclick="return alerta()">&#10004;</a>
                    @endif
                </td>     
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@stop









