@extends('master')
@section('contenido')

<h1 class="text-center">Registro de Productos</h1>

<div class="container">
  @if($aux == 1)
  <?php
  echo "<script>
                        alert('Los Datos Ingresados Ya Existen');
                    </script>";
  ?>
  @endif
  <form action="{{url('producto/registro')}}" method="POST">
    @csrf
    <br>

    <!-- Etiquetas de tipo Select -->
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">@</span>
      </div>
      <input type="text" class="form-control" name="idpro" placeholder="Id Del Producto" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    <br>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="categoria">Categorias</label>
      </div>
      <select class="form-select" id="categoria" name="categoria" required>
        <option value="">Selecione una categoria</option>
        @foreach($categorias as $c)
        @if($c->estadocat == 1)
        <option value="{{$c->Idcategoria}}">{{$c->nombrecat}}</option>
        @endif
        @endforeach
      </select>
    </div>
    <br>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">@</span>
      </div>
      <input type="text" class="form-control" name="nompro" placeholder="Nombre Del Producto" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    <br>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">@</span>
      </div>
      <input type="text" class="form-control" name="descripcionpro" placeholder="Descripción Del Producto" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    <br>

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <label class="input-group-text" for="marcapro">Marca</label>
      </div>
      <select class="form-select" id="marcapro" name="marcapro" required>
        <option value="">Selecione una categoria</option>
        @foreach($marcas as $c)
        @if($c->estadomarca == 1)
        <option value="{{$c->idmarca}}">{{$c->descripcionmarca}}</option>
        @endif

        @endforeach
      </select>
    </div>



    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">#</span>
      </div>
      <input type="number" class="form-control" name="cantidad" placeholder="Cantidad Del Producto" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    <br>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">#</span>
      </div>
      <input type="number" class="form-control" name="precio" placeholder="Precio Unitario Del Producto" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>
    <br>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">@</span>
      </div>
      <input type="file" class="form-control " name="foto" placeholder="Foto Del Producto" aria-label="Username" aria-describedby="basic-addon1" required>
    </div>



    <br><br>
    <button type="submit" class="btn btn-success" onclick="return alerta()">Registrar</button>
    <a href="{{url('producto/lista')}}" class="btn btn-info">Cancelar</a>
    <br><br>

  </form>
</div>
@stop