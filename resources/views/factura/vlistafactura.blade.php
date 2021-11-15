@extends('master')
@section('contenido')
<br>
<h1 class="text-center">Lista de Facturas</h1>
<div class="container">
  <form action="{{url('factura/formregistro')}}" method="POST">
    @csrf
    <div class="input-group mb-3">
      <a href="{{url('factura/formregistro')}}" class="btn-registrar btn btn-info">Registrar</a>
    </div>
  </form>
</div>
<div class="container">
  <table id="example" class="table table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id Factura</th>
        <th scope="col">Proveedor</th>
        <th scope="col">Fecha</th>
        <th scope="col">Total</th>
        <th scope="col">Estado</th>
        <th scope="col">Más</th>
      </tr>
    </thead>
    <tbody class="table-info">
      @foreach($facturas as $p)
      <tr>
        <th scope="row">{{$p->Idfactura}}</th>
        <td> {{$p->proveedores->Nombreprove}}</td>
        <td> {{$p->Fechafac}}</td>
        <td> {{$p->Idpro}}</td>
        <td> {{$p->estados->descripcionestado}}</td>
        <td style="width: 130px;">
          <a href="{{route('facdetalle', $p->Idfactura)}}" class="btn btn-info">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
          </a>
          @if($p->estadofac == 2)
          <a href="{{route('activarFactura', $p->Idfactura)}}" class="btn btn-warning" onclick="return activar()">&#10004;</a>
          @else
          <a href="{{route('eliminarFac', ['fac'=>$p->Idfactura, 'pro'=>$p->Idpro])}}" class="btn btn-danger" onclick="return eliminar()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
            </svg>
          </a>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>

  </table>


</div>

@stop