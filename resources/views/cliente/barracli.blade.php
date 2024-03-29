<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{url('/')}}">Drogueria</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{url('cliente/lista')}}">Productos</a>
      </li>
      @if(Auth::user())
      <li class="nav-item">
        <a class="nav-link" href="{{url('cliente/factura')}}">Factura</a>
      </li>
      @endif
      </li>
      <form action="{{url('cliente/buscar')}}" method="POST" class="d-flex" style="margin-left: 50px;width: 900px; ">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Busca Lo Que Deseas" name="consultaPro" aria-label="Search" style="margin-right: 50px;">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
      @if(Auth::user() != NULL)
      <div style="margin-left: 300px;">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Cerrar Sesión
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
        </li>
      </div>
      </li>
  </div>
  @else
  <div style="margin-left: 300px;">
    <li class="nav-item dropdown">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{url('iniciar')}}">Iniciar Sesión</a>
    </li>
    </li>
  </div>
  @endif
  </ul>
  </form>
  </div>
</nav>