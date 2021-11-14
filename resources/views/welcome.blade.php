@extends('cliente.mastercli')
@section('content') 
<div style="margin-bottom: 50px;">
    @if($aux == 0)
        <?php 
            echo "<script>
                alert('Su Usuario Esta Desactivado No se Le permite el Ingreso');
            </script>";
        ?>
        
        
    
    @endif 

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

        
        <div class="container" style="height: 200px;width: 800px;margin-left: 5%;">
            <br>
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="2000">
                    <img src='{{url("/imagenes/slide4.webp")}}' height="200" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src='{{url("/imagenes/slide3.jpg")}}' class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item"  data-bs-interval="2000">
                    <img src='{{url("/imagenes/slide1.jpg")}}'  class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"  data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"  data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Siguiente</span>
                </button>
              </div>
              <br>
              <div class="container" style="margin-left: 110%;margin-top: -30%;">
        
                <div id="map-container-google-3" class="z-depth-1-half map-container-3">
                    <iframe width="700" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4295.883512178578!2d-77.63972598504778!3d0.8238791632685313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e296beeb405801b%3A0x8fd75e36aca4f550!2sCra.%207%20%2311-47%2C%20Ipiales%2C%20Nari%C3%B1o!5e1!3m2!1ses-419!2sco!4v1613492327615!5m2!1ses-419!2sco" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                       
                </div>
            </div>
            
        </div>
        <br><br>
        <div class="container">
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
    
</div>

@stop