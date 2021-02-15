
@extends('master')
@section('contenido') 
    <br>
    <h1 class="text-center">Formulario de registro Factura</h1>

    <div class="container">
        <form action="{{url('factura/registro')}}" method="POST" >
            @csrf
            <br>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Id Factura</span>
            </div>
            <input type="number" min="1" class="form-control" name="idfac" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
            <br>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="proveedor">Proveedor</label>   
                </div>
                <select class="custom-select" id="proveedor" name="proveedor" required>
                    <option value="" >Selecione un proveedor</option>
                    @foreach($proveedores as $c)
                        <option value="{{$c->Idproveedor}}">{{$c->Nombreprove}}</option>
                    @endforeach
                </select>
            </div>

            <br>
            <div class="input-group mb-3 ">
                <div class="input-group-prepend">
                    <span class="input-group-text " id="basic-addon1">Fecha</span>
                </div>
                <input type="date" class="form-control" name="fecha"  aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <br>

            
            <div>
                <table id="example" class="table table-bordered table-hover" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Cantidad</th>
                            
                        </tr>
                    </thead>
                    <tbody class="table-info">
                        @foreach($productos as $p)
                        <tr>
                        <th scope="row">
                            <input type="text" style="max-width: 100px;" value="{{$p->Idproducto}}" disabled>
                            <input type="hidden" style="max-width: 100px;" value="{{$p->Idproducto}}" name="idpro[]" id="idpro">
                        </th>
                        <td> {{$p->Nombrepro}}</td>
                        <td> {{$p->marcas->descripcionmarca}}</td>
                        <td> {{$p->estados->descripcionestado}}</td>
                        <td> {{$p->Cantidadpro}}</td>     
                        <td> <input type="number" style="max-width: 100px;" name="precio[]" placeholder="Precio"></td></td>
                        <td> {{$p->categorias->nombrecat}}</td>  
                        <td> <input type="number" style="max-width: 100px;" name="cantidad[]" placeholder="Cantidad"></td>  
                        
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
            <br><br>
        <button type="submit" class="btn btn-success" onclick="return alerta()">Registrar</button>
        <a href="{{url('factura/lista')}}"  class="btn btn-info" >Cancelar</a>
        <br><br>
        </form>
    </div>
    
@stop
