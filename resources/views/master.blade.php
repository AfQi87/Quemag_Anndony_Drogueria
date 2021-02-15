<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DrogueriaColombia</title>

        <!-- CARGA CSS -->
        
        <link href="{{ url('/estilos.css') }}" rel="stylesheet"> 
        <link href="{{ url('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('/bootstrap/estilos.css') }}" rel="stylesheet">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
        
    </head>
    <body class="antialiased" back>
        @include('barra')
        <div class="wrapper">
            @yield('contenido')
        </div>
        

        <!-- CARGA JQUERY POPPPERS Y JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        
        
        
        <script type="text/javascript" src="{{ url('/bootstrap/js/funciones.js')}}"></script>
        

        
        
    </body>
    <footer>
        @include('pie')
    </footer>
</html>
