@extends('master')
@section('contenido') 
    
    <h1 class="text-center">Formulario de Actualización de producto</h1>

    <div class="container"> 
    @if($aux == 1)
            <?php 
                echo "<script>
                    alert('Los Datos Ingresados Ya Existen');
                </script>";
            ?>
    @endif 

    <form action="{{route('actualizarProducto', $producto->Idproducto )}}" method="POST" >
        @csrf
        <br>
        
         <!-- Etiquetas de tipo Select -->
         <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="categoria">Categorias</label>   
            </div>
            <select class="custom-select" id="categoria" name="categoria" required>
                <option value="{{$producto->categorias->Idcategoria}}" selected="true" >{{$producto->categorias->nombrecat}} </option>
                @foreach($categorias as $c)
                <option value="{{$c->Idcategoria}}" >{{$c->nombrecat}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" value="{{$producto->Nombrepro}}" name="nompro" placeholder="Nombre Del Producto" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>  
        <br>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" value="{{$producto->Descripcionpro}}"  name="descripcionpro" placeholder="Descripción Del Producto" aria-label="Username" aria-describedby="basic-addon1" required> 
        </div>
        <br>  
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="marcapro">Marca</label>   
            </div>
            <select class="custom-select" id="marcapro" name="marcapro" required>
                <option value="{{$producto->marcas->idmarca}}" selected="true" >{{$producto->marcas->descripcionmarca}} </option>
                @foreach($marcas as $c)
                <option value="{{$c->idmarca}}" >{{$c->descripcionmarca}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">#</span>
            </div>
            <input type="number" class="form-control" value="{{$producto->Cantidadpro}}"  name="cantidad" placeholder="Cantidad Del Producto" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
        <br>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">#</span>
            </div>
            <input type="number" class="form-control" value="{{$producto->Preciopro}}"  name="precio" placeholder="Precio Unitario Del Producto" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
        <br>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control " value="{{$producto->fotopro}}"  name="foto" placeholder="Foto Del Producto" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>

        <input type="hidden" class="form-control " value="{{$producto->estadopro}}"  name="estado" placeholder="Foto Del Producto" aria-label="Username" aria-describedby="basic-addon1" required>


        <br><br>
        <button type="submit" class="btn btn-success" onclick="return actualizar()">Actualizar</button>
        <a href="{{url('producto/lista')}}"  class="btn btn-info" >Cancelar</a>
        <br><br>

    </form>
</div>
@stop
