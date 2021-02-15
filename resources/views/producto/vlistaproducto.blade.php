@extends('master')
@section('contenido') 
    <br>
    <h1 class="text-center">Lista de  producto</h1>
    <br>

    <div class="container" >
        <form action="{{url('producto/buscar')}}" method= "POST">
            @csrf
            <div class="input-group mb-3">
                <a href="{{url('producto/formregistro')}}"  class="btn btn-info" >Registrar</a>
                <input type="text" style="margin-left: 700px; max-width: 200px;margin-right: 20px;" class="form-control" id="consultaPro" name="consultaPro" placeholder="Nombre Del Producto" aria-label="Username" aria-describedby="basic-addon1" required>
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
                     <a href="{{route('eliminarProducto', $p->Idproducto)}}"  class="btn btn-danger" onclick="return alerta()">&#10060;</a>
                    @if($p->estadopro == 2)
                        <a href="{{route('activarProducto', $p->Idproducto)}}"  class="btn btn-warning" onclick="return alerta()">&#10004;</a>
                    @endif
                </td>     
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@stop
