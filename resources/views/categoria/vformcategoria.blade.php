@extends('master')
@section('contenido') 
    
    <h1 class="text-center">Formulario de registro Categoria</h1>

    <div class="container"> 
    <form action="{{url('categoria/formcategoria')}}" method="POST" >
        @csrf
        <br>
        
         <!-- Etiquetas de tipo Select -->
        
        <br>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" name="idcategoria" required placeholder="Id Categoria" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" name="nombre" required placeholder="Nombre De Categoria" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>  
        <br>




        <br><br>
        <button type="submit" class="btn btn-success" onclick="return alerta()">Registrar</button>
        <br><br>

    </form>
</div>
@stop
