@extends('cliente.mastercli')
@section('content')

<div class="container">
  <br>
  <h1 class="text-center">Lista de producto</h1>
  <br>
  <form action="{{url('cliente/buscar')}}" method="POST">
    @csrf
    <div class="input-group mb-3">
      <div style="margin-left:auto">
        <button type="button" class="btn btn-outline-secondary">Productos</button>
        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="sr-only"></span>
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{url('cliente/lista')}}" s>Todos</a>
          @foreach($categorias as $c)
            <a class="dropdown-item" href="{{route('clienteLis', $c->Idcategoria)}}">{{$c->nombrecat}}</a>
          @endforeach
        </div>
      </div>
      <input type="text" style="margin-left: 650px; max-width: 200px;margin-right: 20px;" class="form-control" id="consultaPro" name="consultaPro" placeholder="Nombre Del Producto" aria-label="Username" aria-describedby="basic-addon1">
      <input type="submit" class="btn btn-success" value="Consultar">
      <button type="button" class="btn btn-primary" style="margin-left: 30px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Carrito De Compras
      </button>
    </div>
  </form>
  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" style="margin-left: 600px; max-height: 800px;overflow-y: scroll;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tus Productos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @if(count($items)==0)
          <h2>Aún No agregas Productos</h2>
          @else
          @foreach($items as $p)
          <a href="{{route('eliminarItem', ['pro'=>$p->productos->Idproducto, 'fac'=>$aux])}}" class="close btn btn-outline-danger btn-eliminar"><i class="bi bi-cart-x icon-eliminar"></i></a>
          @php
          $foto=$p->productos->fotopro;
          @endphp
          <img alt='....' height="140" width="120" src='{{url("/imagenes/$foto")}}'>

          <h6 class="card-text" style="margin-left: 150px;margin-top: -130px;">Producto: <b> {{$p->productos->Nombrepro}}</b></h6>
          <h6 class="card-text" style="margin-left: 150px">Referencia: <b> {{$p->productos->Idproducto}}</b></h6>

          <h6 class="card-text" style="margin-left: 150px">Subtotal: <b>{{$p->Totalitem}}</b> </h6>
          <h6 class="card-text" style="margin-left: 150px">Stock: <b>{{$p->productos->Cantidadpro}}</b> </h6>
          <br>
          <div class="alert alert-danger" role="alert" style="width: 180px;margin-left: 250px;">
            <h6 class="card-text">Precio: <b>${{$p->Precioitem}}</b> </h6>
          </div>
          @if(Auth::user())
          <form action="{{route('agregaritem')}}" method="POST">
            @csrf
            <input type="hidden" name="lado" value="2">
            <input type="hidden" name="car" value="{{$car}}">
            <input type="hidden" name="fac" value="{{$aux}}">

            <input type="hidden" name="usuario" value="{{ Auth::user()->id }}">

            <input type="hidden" name="fecha" value='<?php echo date("Y-m-d"); ?>'>
            <input type="hidden" name="producto" value="{{$p->productos->Idproducto}}">
            <input type="hidden" name="precio" value="{{$p->productos->Preciopro}}">
            <div class="quantity" style="margin-top: -60px;">
              <input type="number" min="1" max="{{$p->Cantidaditem+$p->productos->Cantidadpro}}" name="cantidad" step="1" value="{{$p->Cantidaditem}}" required>

            </div>
            <button type="submit" class="btn btn-outline-danger" style="margin-left: 5px;">Agregar Al Carrito</button>
          </form>
          @endif

          <h6>===================================================</h6>
          @endforeach
          <h5 class="card-text">Total: <b>{{$factura->Totalfacven}}</b> </h5>

          @endif
        </div>
        @if(count($items)!=0)
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Seguir Comprando</button>
          <a href="{{route('pagar', ['pro'=>$p->productos->Idproducto, 'fac'=>$aux])}}" class="btn btn-outline-success">Finalizar Compra</a>

        </div>
        @endif
      </div>
    </div>
  </div>

</div>

<div class="container">
  <div class="row">
    @php
    $i=0;
    @endphp
    @if(count($productos) >0)
    @foreach($productos as $p)
    @if($p->estadopro == 1)
    <div class="col-md-4" style="margin-bottom: 20px;">
      <div class="card" style="width: 18rem;">
        <img src='{{url("/imagenes/$p->fotopro")}}' height="300" width="300" class="card-img-top" alt="...">

        <div class="card-body">
          <div style="height: 90px;">
            <h2>{{$p->Nombrepro}}</h2>
          </div>
          <div class="alert alert-danger" role="alert">
            <p class="card-text">Precio: ${{$p->Preciopro}}</p>
          </div>
        </div>
        <div class="card-footer bg-transparent" style="height: 60px;">

          <div>
            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#a{{$i}}">Detalle</button>
            @if(Auth::user())
            <div style="margin-left: 51%; margin-top: -15%">
              <form action="{{route('agregaritem')}}" method="POST">
                @csrf
                <input type="hidden" name="lado" value="1">
                <input type="hidden" name="car" value="{{$car}}">
                <input type="hidden" name="fac" value="{{$aux}}">
                <input type="hidden" name="usuario" value="{{ Auth::user()->id }}">
                <input type="hidden" name="fecha" value='<?php echo date("Y-m-d"); ?>'>
                <input type="hidden" name="producto" value="{{$p->Idproducto}}">
                <input type="hidden" name="precio" value="{{$p->Preciopro}}">
                <div class="quantity">
                  <input type="number" min="1" max="{{$p->Cantidadpro}}" name="cantidad" step="1" value="1" required>
                </div>
                <button type="submit" class="btn btn-outline-danger" style="margin-left: 5px">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                  </svg>
                </button>
              </form>
            </div>
            @else
            <a class="cnf-pro btn btn-outline-danger" href="{{url('iniciar')}}" style="float: right;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
              </svg>
            </a>
            @endif
          </div>

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
                  <h6 class="card-text">Marca: <b>{{$p->marcas->descripcionmarca}}</b>
                    <h6>
                      <h6 class="card-text">Stock: <b>{{$p->Cantidadpro}}</b></h6>
                      <h6 class="card-text"> Descripción: <br><br>
                        <b>{{$p->Descripcionpro}}</b>
                      </h6>
                </div>
                @if(Auth::user())
                <div class="modal-footer">
                  <button type="button" style="margin-right: auto;" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <form action="{{route('agregaritem')}}" method="POST">
                    @csrf
                    <input type="hidden" name="lado" value="1">
                    <input type="hidden" name="car" value="{{$car}}">
                    <input type="hidden" name="fac" value="{{$aux}}">
                    <input type="hidden" name="usuario" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="fecha" value='<?php echo date("Y-m-d"); ?>'>
                    <input type="hidden" name="producto" value="{{$p->Idproducto}}">
                    <input type="hidden" name="precio" value="{{$p->Preciopro}}">
                    <div class="quantity">
                      <input type="number" min="1" max="{{$p->Cantidadpro}}" style="margin-left: -100px;" name="cantidad" step="1" value="1" required>
                    </div>
                    <button type="submit" class="btn btn-outline-danger" style="margin-left: 5px;">Agregar Al Carrito</button>
                  </form>
                </div>
                @else
                <a class="cnf-pro btn btn-outline-danger" href="{{url('iniciar')}}" style="margin: 30px">Agregar Al Carrito</a>
                @endif
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    @endif
    @php
    $i++;
    @endphp

    @endforeach
    @else
    <h2>No Existen Productos</h2>
    @endif
  </div>
</div>
<!-- Button trigger modal -->



@stop