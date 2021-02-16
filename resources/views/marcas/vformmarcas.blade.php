@extends('master')
@section('contenido') 
    
    <h1 class="text-center">Formulario de Marcas6ty </h1>

    <div class="container"> 
    @if($aux == 1)
            <?php 
                echo "<script>
                    alert('Los Datos Ingresados Ya Existen');
                </script>";
            ?>
    @endif 
    <form action="{{url('marca/formmarca')}}" method="POST" >
        @csrf
        <br>
        
         <!-- Etiquetas de tipo Select -->
        
        <br>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Nombre</span>
            </div>
            <input type="text" class="form-control" name="nombre" required placeholder="Nombre Marca" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>  
        <br>




        <br><br>
        <button type="submit" class="btn btn-success" onclick="return alerta()">Registrar</button>
        <br><br>

    </form>
</div>
@stop
