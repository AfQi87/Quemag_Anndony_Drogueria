@extends('master')
@section('contenido') 
    <br>
    <h1 class="text-center">Lista de Facturas</h1>

<div class="container">

    <table id="example" class="table table-bordered table-hover" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th scope="col" >Id Factura</th>
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
            <td> {{$p->Totalfac}}</td>
            <td> {{$p->estados->descripcionestado}}</td>     
            <td style="width: 130px;"> 
                
                
                <a href="{{route('facdetalle', $p->Idfactura)}}"  class="btn btn-info" >&#10133;</a>
                @if($p->estadofac == 2)
                    <a href="{{route('activarFactura', $p->Idfactura)}}"  class="btn btn-warning" onclick="return alerta()">&#10004;</a>
                @else
                    <a href="{{route('eliminarFac', $p->Idfactura)}}"  class="btn btn-danger" onclick="return alerta()">&#10060;</a>
                @endif
            </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>

  
</div>

@stop
