@extends('cliente.mastercli')
@section('content') 
    

    <div class="container" >
        <br><br>
        <h3>Orden Número: </h3>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">PRODUCTOS</th>
                <th scope="col">MARCA</th>
                <th scope="col">PRECIO</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col">SUBTOTAL</th>
                <th scope="col">ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
        @foreach($items as $p)
                    <tr>
                        <th style="width: 700px;height: 150px;">
                            @php
                                $foto=$p->productos->fotopro;
                                $fac=$p->Idfacven;
                                $tot=$p->facturasven->Totalfacven;
                            @endphp
                            <img alt='....' height="140" width="120" src='{{url("/imagenes/$foto")}}'>
                            <br><h3 style="margin-top: -90px;margin-left: 150px;">Nombre: {{$p->productos->fotopro}}</h3>
                            <p style="margin-left: 150px;">Referencia: {{$p->productos->Idproducto}}</p> </th>
                            <td><br><br>{{$p->productos->marcas->descripcionmarca}}</td>
                            <td><br><br>${{$p->productos->Preciopro}}</td>
                            <td><br><br> 
                            <form action="{{route('agregaritem')}}" method="POST">
                                @csrf
                                <input type="hidden" name="lado" value="3">
                                <input type="hidden" name="car" value="1">
                                <input type="hidden" name="fac" value="{{$p->Idfacven}}">
                                <input type="hidden" name="usuario" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="fecha" value='<?php echo date("Y-m-d");?>'>
                                <input type="hidden" name="producto" value="{{$p->productos->Idproducto}}">
                                <input type="hidden" name="precio" value="{{$p->productos->Preciopro}}">
                                <div class="quantity">
                                    <input type="number" min="1" max="{{$p->Cantidaditem+$p->productos->Cantidadpro}}" name="cantidad" step="1" value="{{$p->Cantidaditem}}" required>
                                    <button type="submit" class="btn btn-outline-danger" style="margin-left: 5px;">&#10004;</button>
                                </div>
                                
                            </form>   </td>
                        <td><br><br>${{$p->Totalitem}}</td>
                        <td><br><br><a href="" class="close" >&#10060;</a></td>
                    </tr>                
        @endforeach
            </tbody>
        </table>
        <h3> <b>Valor Total: ${{$tot}}</b> </h3>
        <a href="{{route('fin', ['fac'=>$fac])}}" style="margin-left: 95%;margin-top: -60px;" class="btn btn-outline-success" >Pagar</a>
       
    </div>
    
@stop
