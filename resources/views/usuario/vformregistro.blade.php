@extends('master')
@section('contenido') 
    <br>
    <h1 class="text-center">Registro Usuario</h1>

    <div class="container">
    @if($aux == 1)
            <?php 
                echo "<script>
                    alert('Los Datos Ingresados Ya Existen');
                </script>";
            ?>
    @endif 
        <form action="{{url('usuario/registro')}}" method="POST" >
            @csrf
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="number" class="form-control" name="id" placeholder="Id Usuario" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" name="name" placeholder="Nombre Del Usuario" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>  
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="email" class="form-control" name="email" placeholder="Coreo Usuario" aria-label="Username" aria-describedby="basic-addon1" required>
            </div> 

            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="password" class="form-control" name="password" placeholder="contraseña" aria-label="Username" aria-describedby="basic-addon1" required> 
            </div> 
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="password" class="form-control" name="password_confirmation" type="password" data-type="password" placeholder="contraseña" aria-label="Username" aria-describedby="basic-addon1" required> 
            </div> 
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="tipopro">Tipo</label>   
                </div>
                <select class="form-select" id="tipopro" name="tipopro" required>
                    <option value="" >Selecione Tipo de Persona</option>
                    @foreach($tipos as $c)
                    <option value="{{$c->idtipo}}">{{$c->descripciontipo}}</option>
                    @endforeach
                </select>
            </div>       

            <br><br>
            <button type="submit" class="btn btn-success" onclick="return alerta()">Registrar</button>
            <a href="{{url('usuario/lista')}}"  class="btn btn-danger" >Cancelar</a>
            <br><br>

        </form>
    </div>
@stop
