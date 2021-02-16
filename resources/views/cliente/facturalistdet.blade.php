@extends('cliente.mastercli')
@section('content')
    <br>
    <h1 class="text-center">Detalle Factura</h1>

<div class="container">

    <div class="input-group input-group-lg">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-lg">Id Factura</span>
        </div>
        <input type="text" class="form-control" aria-label="Large" value="{{$facturas->Idfacven}}" aria-describedby="inputGroup-sizing-sm" disabled>
        
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-lg">Fecha</span>
        </div>
        <input type="text" class="form-control" aria-label="Large" value="{{$facturas->Fechafacven}}" aria-describedby="inputGroup-sizing-sm" disabled>
    </div>
    <br>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
        </div>
        <input type="text" class="form-control" aria-label="Default" value="{{$facturas->usuarios->name}}" aria-describedby="inputGroup-sizing-default" disabled>
    
    </div>
    <br>
    <div class="container">
        <h3> Productos Adquiridos</h3>
    </div>
    <br>
    <div class="container">

        <table id="example" class="table table-bordered table-hover" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" >Id Producto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody class="table-info">
                @foreach($items as $p)
                <tr>
                <th scope="row">{{$p->Idpro}}</th>
                <td> {{$p->productos->Nombrepro}}</td>
                <td> {{$p->Cantidaditem}}</td>
                <td> ${{$p->Precioitem}}</td>
                <td> ${{$p->Totalitem}}</td>     
                
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>

    <div class="input-group input-group-lg">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-lg">Total Pagado</span>
        </div>
        <input type="text" class="form-control" aria-label="Large" value="{{$facturas->Totalfacven}}" aria-describedby="inputGroup-sizing-sm" disabled>
        <a href="{{url('cliente/lista')}}" class="btn btn-success" style="margin-left: 10px;" >Finalizar</a>
    </div>
    <br><br>
    
    
</div>

@stop
