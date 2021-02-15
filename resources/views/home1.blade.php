<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DrogueriaColombia</title>

        <!-- CARGA CSS -->
        <link href="{{ url('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('/estilos.css') }}" rel="stylesheet"> 

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
        
    </head>
    <body class="antialiased" back>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{url('/dashboard')}}">Drogueria</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Productos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{url('producto/formregistro')}}">Registrar</a>
          <a class="dropdown-item" href="{{url('producto/lista')}}">Listar</a>
          <a class="dropdown-item" href="{{url('producto/buscar')}}">Buscar</a>
          <a class="dropdown-item" href="{{url('producto/formcategoria')}}">Registrar Categoria</a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Proveedores
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{url('proveedor/formregistro')}}">Registrar</a>
          <a class="dropdown-item" href="{{url('proveedor/lista')}}">Listar</a>
          <a class="dropdown-item" href="{{url('proveedor/buscar')}}">Buscar</a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Facturas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{url('factura/formregistro')}}">Registrar</a>
          <a class="dropdown-item" href="{{url('factura/lista')}}">Listar</a>
          <a class="dropdown-item" href="{{url('factura/buscar')}}">Buscar</a>
          <div class="dropdown-divider"></div>
        
        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{url('dashboard')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Iniciar Sesión
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{url('dashboard')}}">Iniciar</a>
         
          <div class="dropdown-divider"></div>
        
        </div>
      </li>
      

      
    </ul>
    

    
    
    
      
    </form>
  </div>
</nav>
        

        <!-- CARGA JQUERY POPPPERS Y JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/bootstrap/js/funciones.js')}}"></script>

        
        
    </body>
    <footer>
        @include('pie')
    </footer>
</html>