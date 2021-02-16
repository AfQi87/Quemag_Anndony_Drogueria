@extends('master') 
@section('contenido')
<div class="container">
    <h1 style="text-align: center;">Bienvenido Administrador</h1>
    
</div>
<div class="container">
    
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
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>
    <br><br>

    <div class="container" >
        
        <div id="map-container-google-3" class="z-depth-1-half map-container-3">
            <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4295.883512178578!2d-77.63972598504778!3d0.8238791632685313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e296beeb405801b%3A0x8fd75e36aca4f550!2sCra.%207%20%2311-47%2C%20Ipiales%2C%20Nari%C3%B1o!5e1!3m2!1ses-419!2sco!4v1613492327615!5m2!1ses-419!2sco" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
               
        </div>
    </div>   
    <br>    
</div>
 

@stop
