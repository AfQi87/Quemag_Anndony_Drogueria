@extends('cliente.mastercli')
@section('content') 
<div style="margin-bottom: 50px;">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src='{{url("/imagenes/slide1.jpg")}}' height="400" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src='{{url("/imagenes/slide2.jpg")}}' height="400" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src='{{url("/imagenes/slide3.jpg")}}' height="400" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src='{{url("/imagenes/slide5.png")}}' height="400" class="d-block w-100" alt="...">
        </div>
        
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        
    </div>

    
    <div class="container" style="margin-top:30px;">
    
        <div style="width: 300px;max-height: 500px;background-color: rgba(255, 255, 255, 0.199);">
                <h1>Categorias</h1>
                <ul class="list-group">
                    
                    @foreach($categorias as $c)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{route('clienteLis', $c->Idcategoria)}}" >{{$c->nombrecat}}</a>    
                      </li>
                    @endforeach
                    
                  </ul>
                
        </div>
    </div>
    <br><br>
    

@stop