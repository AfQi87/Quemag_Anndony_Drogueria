@extends('master')
@section('contenido') 
    <br>
    <h1 class="text-center">Lista de  producto</h1>
    <br>

    <div class="container" >
        <form action="{{url('categoria/buscar')}}" method= "POST">
            @csrf
            <div class="input-group mb-3">
                <a href="{{url('categoria/formcategoria')}}" style="margin-left:100%" class="btn btn-info" >Registrar</a>
                
            </div> 
            
            
        
        </form>
    </div>


    <div class="container" style="margin-top: -75px;">
        <table id="example" class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Más</th>
                </tr>
            </thead>
            <tbody class="table-info">
                @foreach($categorias as $p)
                <tr>
                <th scope="row">{{$p->Idcategoria}}</th>
                <td> {{$p->nombrecat}}</td>
                
                <td> {{$p->estados->descripcionestado}}</td>  
                <td> <a href="{{route('actualizarCat', $p->Idcategoria)}}"  class="btn btn-success">&#9999;</a> 
                     
                    @if($p->estadocat == 2)
                        <a href="{{route('activarCategoria', $p->Idcategoria)}}"  class="btn btn-warning" onclick="return activar()">&#10004;</a>
                    @else
                        <a href="{{route('eliminarCategoria', $p->Idcategoria)}}"  class="btn btn-danger" onclick="return desactivar()">&#10060;</a>    
                    @endif
                </td>     
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@stop
