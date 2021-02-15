@extends('cliente.mastercli')
@section('content') 
    

    <div class="container" >
        <div style="background-color: rgba(0, 0, 0, 0.13);max-width: 1000px;height: 500px; margin-bottom: 50px;">
            <br><br>
            <a href="{{url('cliente/lista')}}" class="close" style="margin-right: 50px;" >&#10060;</a>
            <div class="row g-0" >
                    
                    <div class="col-md-5" style="max-width: 500px;">
                    <img src='{{url("/imagenes/$productos->fotopro")}}' height="400" width="400" alt="...">
                    </div>
                    <div class="col-md-4">
                    <div class="card-body">
                        <h3 class="card-title">{{$productos->Nombrepro}}</h3>
                        <p class="card-text">Referencia: {{$productos->Idproducto}}</p>
                        <div class="alert alert-danger" role="alert">
                            <p class="card-text">Precio: ${{$productos->Preciopro}}</p>
                        </div>
                        <p class="card-text">Categoria: {{$productos->categorias->nombrecat}}</p>
                        <p class="card-text">Marca: {{$productos->marcas->descripcionmarca}}</p>
                        <p class="card-text">Stock: {{$productos->Cantidadpro}}</p>
                        <p class="card-text"> Descripción: <br>
                            {{$productos->Descripcionpro}}</p>

                        <form action="" method="POST">
                            <div class="quantity">
                                <input type="number" min="1" max="{{$productos->Cantidadpro}}" step="1" value="1" required>
                                <button type="submit" class="btn btn-outline-danger" style="margin-left: 5px;" onclick="return alerta()">Agregar Al Carrito</button>
                            </div>
                        </form>


                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
@stop
