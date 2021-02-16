@extends('cliente.mastercli')
@section('content')
    <br>
    <h1 class="text-center">Lista de Facturas</h1>

<div class="container">

    <table id="example" class="table table-bordered table-hover" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th scope="col" >Id Factura</th>
                <th scope="col">Usuario</th>
                <th scope="col">Fecha</th>
                <th scope="col">Total</th>
               
                <th scope="col">Más</th>
            </tr>
        </thead>
        <tbody class="table-info">
            @foreach($facturas as $p)
                @if($p->estadofacv == 1)
                    <tr>
                        <th scope="row">{{$p->Idfacven}}</th>
                        
                        <td> {{$p->usuarios->name}}</td>
                        <td> {{$p->Fechafacven}}</td>
                        <td> ${{$p->Totalfacven}}</td>
                        
                        <td style="width: 130px;"> 
                            <a href="{{route('facvendetalle', $p->Idfacven)}}"  class="btn btn-info" >&#10133;</a> 
                        </td>
                    </tr>
                @endif
            
            @endforeach
        </tbody>
        
    </table>

  
</div>

@stop
