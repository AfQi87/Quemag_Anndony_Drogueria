@extends('master')
@section('contenido') 
    
    <h1 class="text-center">Formulario de Actualizar Marca</h1>

    <div class="container"> 

        @if($aux == 1)
            <?php 
                echo "<script>
                    alert('Los Datos Ingresados Ya Existen');
                </script>";
            ?>
        @endif 

    <form action="{{route('actualizarMarca', $marca->idmarca )}}" method="POST" >
        @csrf
        <br>
        
         <!-- Etiquetas de tipo Select -->
        
        <br>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Nombre</span>
            </div>
            <input type="text" class="form-control" name="idcategoria" value="{{$marca->idmarca}}" required placeholder="Id Categoria" aria-label="Username" aria-describedby="basic-addon1" disabled>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Nombre</span>
            </div>
            <input type="text" class="form-control" name="nombre" value="{{$marca->descripcionmarca}}" required placeholder="Nombre De Categoria" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>  
        <br>




        <br><br>
        <button type="submit" class="btn btn-success" onclick="return actualizar()">Actualizar</button>
        <a href="{{url('categoria/lista')}}"  class="btn btn-info" >Cancelar</a>
        <br><br>

    </form>
</div>
@stop
