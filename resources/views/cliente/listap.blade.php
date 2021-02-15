@extends('cliente.mastercli')
@section('content') 
    

    <div class="container" >
        <br>
        <h1 class="text-center">Lista de  producto</h1>
        <br>
        <form action="{{url('cliente/buscar')}}" method= "POST">
            @csrf
            <div class="input-group mb-3">
                <div style="margin-left:auto">
                    <button type="button"  class="btn btn-outline-secondary">Productos</button>
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only"></span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('cliente/lista')}}"s>Todos</a>
                        @foreach($categorias as $c)
                            <a class="dropdown-item" href="{{route('clienteLis', $c->Idcategoria)}}">{{$c->nombrecat}}</a>
                        @endforeach
                        
                    </div>
                </div>
                <input type="text" style="margin-left: 650px; max-width: 200px;margin-right: 20px;" class="form-control" id="consultaPro" name="consultaPro" placeholder="Nombre Del Producto" aria-label="Username" aria-describedby="basic-addon1" >
                <input type="submit" class="btn btn-success" value="Consultar">
                <button type="button" class="btn btn-primary" style="margin-left: 30px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Carrito De Compras
                </button>
            </div> 
            
         <!-- Button trigger modal -->
        
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" style="margin-left: 600px; max-height: 800px;overflow-y: scroll;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lista De Tus Compras</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-success">Finalizar</button>
                </div>
            </div>
            </div>
        </div>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @php
                $i=0;
            @endphp

            @foreach($productos as $p)
            <div class="col-md-4" style="margin-bottom: 20px;">
                <div class="card" style="width: 18rem;">
                    <img src='{{url("/imagenes/$p->fotopro")}}' height="300" width="300" class="card-img-top" alt="...">

                    <div class="card-body">
                        <h2>{{$p->Nombrepro}}</h2>
                        <div class="alert alert-danger" role="alert">
                            <p class="card-text">Precio: ${{$p->Preciopro}}</p>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent" style="height: 70px;">
                        <a href="#{{$i}}" class="btn btn-outline-success">Comprar</a>
                        


                        <a href="{{route('clienteDet', $p->Idproducto)}}" class="btn btn-outline-info">Detalle</a>
                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#a{{$i}}">
                            Detalle
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="a{{$i}}" style="max-height: 1000px;overflow-y: scroll;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detalle Producto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src='{{url("/imagenes/$p->fotopro")}}' width="300" height="400" class="card-img-top" alt="No Se Encuentra La Imagen">
                                    <h3 class="card-title">{{$p->Nombrepro}}</h3>
                                    <h6 class="card-text">Referencia: <b> {{$p->Idproducto}}</b></h6>
                                    <div class="alert alert-danger" role="alert">
                                        <h6 class="card-text">Precio: <b>${{$p->Preciopro}}</b> </h6>
                                    </div>
                                    <h6 class="card-text">Categoria: <b>{{$p->categorias->nombrecat}}</b> </h6>
                                    <h6 class="card-text">Marca: <b>{{$p->marcas->descripcionmarca}}</b><h6>
                                    <h6 class="card-text">Stock: <b>{{$p->Cantidadpro}}</b></h6>
                                    <h6 class="card-text"> Descripción: <br><br>
                                        <b>{{$p->Descripcionpro}}</b></h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" style="margin-right: auto;" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <form action="{{url('cliente/item')}}" method="POST">
                                        @if(count($facturas) == 0)
                                            @php
                                                $aux=1;
                                            @endphp
                                        @else
                                            @php
                                                $aux=$factura->Idfacven+1;
                                            @endphp
                                        @endif

                                        <input type="text" name="fac" value="{{$aux}}">
                                        <input type="text" name="usuario" value="{{ Auth::user()->id }}">
                                        <input type="text" name="fecha" value='<?php echo date("Y-m-d");?>'>
                                        

                                        <input type="text" name="producto" value="{{$p->Idproducto}}">
                                        <input type="text" name="precio" value="{{$p->Preciopro}}">

                                        <div class="quantity">
                                            <input type="number" min="1" max="{{$p->Cantidadpro}}" name="cantidad" step="1" value="1" required>
                                            
                                        </div>
                                        <button type="submit" class="btn btn-outline-danger" style="margin-left: 5px;">Agregar Al Carrito</button>
                                    </form>
                                   
                                    
                                </div>
                            </div>
                            </div>
                        </div>

                    </div> 
                </div>
            </div>
            @php
                $i++;
            @endphp

            @endforeach
            
        </div>
    </div>
    <!-- Button trigger modal -->
    

    
@stop
