@extends('master')
@section('contenido') 
    <br>
    <h1 class="text-center">Lista de  producto</h1>
    <br>

    <div class="container" >
        <form action="{{url('producto/buscar')}}" method= "POST">
            @csrf
            <div class="input-group mb-3">
                <a href="{{url('producto/formregistro')}}" style="margin-left:100%" class="btn btn-info" >Registrar</a>
            </div> 
            
            
        
        </form>
    </div>


    <div class="container" style="margin-top: -75px;">
        <table id="example" class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Marca</th>
                <th scope="col">Estado</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio Unitario</th>
                <th scope="col">Categoria</th>
                <th scope="col">Más</th>
                </tr>
            </thead>
            <tbody class="table-info">
                @foreach($productos as $p)
                <tr>
                <th scope="row">{{$p->Idproducto}}</th>
                <td> {{$p->Nombrepro}}</td>
                <td> {{$p->marcas->descripcionmarca}}</td>
                <td> {{$p->estados->descripcionestado}}</td>
                <td> {{$p->Cantidadpro}}</td>     
                <td> {{$p->Preciopro}}</td>
                <td> {{$p->categorias->nombrecat}}</td>  
                <td> <a href="{{route('actualizarPro', $p->Idproducto)}}"  class="btn btn-success">&#9999;</a> 
                     
                    @if($p->estadopro == 2)
                        <a href="{{route('activarProducto', $p->Idproducto)}}"  class="btn btn-warning" onclick="return activar()">&#10004;</a>
                    @else
                        <a href="{{route('eliminarProducto', $p->Idproducto)}}"  class="btn btn-danger" onclick="return desactivar()">&#10060;</a>
                    @endif
                </td>     
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@stop
