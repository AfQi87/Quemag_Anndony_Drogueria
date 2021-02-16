@extends('master')
@section('contenido') 
    <br>
    <h1 class="text-center">Lista de  producto</h1>
    <br>

    <div class="container" >
        <form action="{{url('proveedor/buscar')}}" method= "POST">
            @csrf
            <div class="input-group mb-3">
                <a href="{{url('proveedor/formregistro')}}" style="margin-left:100%" class="btn btn-info" >Registrar</a>
                
               
            </div> 
            
            
        
        </form>
    </div>


    <div class="container" style="margin-top: -75px;">
        <table id="example" class="table table-bordered table-hover">
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
                     
                    @if($p->estadoprov == 2)
                        <a href="{{route('activarProveedor', $p->Idproveedor)}}"  class="btn btn-warning" onclick="return activar()">&#10004;</a>
                    @else
                    <a href="{{route('eliminarProve', $p->Idproveedor)}}"  class="btn btn-danger" onclick="return desactivar()">&#10060;</a>
                    @endif
                </td>     
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@stop









