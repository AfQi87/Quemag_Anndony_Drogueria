<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>DrogueriaColombia</title>

  <!-- CARGA CSS -->
  <link href="{{ url('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('/estilos.css') }}" rel="stylesheet">
  <link href="{{ url('/mystyle.css') }}" rel="stylesheet">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">




</head>

<body class="filter">
  <div class="container">
    <div class="row">
      <div class="col-md-7 mx-auto p-0">
        <div class="card">
          <div class="login-box">
            <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar</label> <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Crear Cuenta</label>
              <div class="login-space">
                @if($aux == 1)
                <?php
                echo "<script>
                                            alert('El Id Ingresado Ya Existe');
                                        </script>";
                ?>
                @endif
                <form method="POST" action="{{ route('login') }}">

                  @csrf
                  <div class="login">
                    <div class="group"> <label for="email" class="label">Email</label> <input id="email" name="email" type="email" class="input" placeholder="Escriba Su Correo" required> </div>
                    <div class="group"> <label for="password" class="label">Password</label> <input id="password" type="password" name="password" class="input" data-type="password" placeholder="Escriba Su Contraseña" required> </div>
                    <div class="group"> <input id="remember_me" type="checkbox" name="remember" class="check" checked> <label for="remember_me"><span class="icon"></span> Recordarme</label> </div>
                    <div class="group"> <input type="submit" class="button" value="Ingresar"> </div>
                    <div class="hr"></div>
                    @if (Route::has('password.request'))
                    <div class="foot"> <a href="{{ route('password.request') }}">Olvido Su Contraseña?</a> </div>
                    @endif

                  </div>
                </form>
                <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="sign-up-form">
                    <div class="group"> <label for="id" class="label">Nombre</label> <input id="id" name="id" type="text" class="input" placeholder="Identificacion" required> </div>
                    <div class="group"> <label for="name" class="label">Nombre</label> <input id="name" name="name" type="text" class="input" placeholder="Crea Un Nombre de Usuario" required> </div>
                    <div class="group"> <label for="email" class="label">Email</label> <input id="email" name="email" type="email" class="input" placeholder="Ingresa tu Correo" required> </div>
                    <div class="group"> <label for="password" class="label">Contraseña</label> <input id="password" name="password" type="password" class="input" data-type="password" placeholder="contraseña" required> </div>
                    <div class="group"> <label for="password_confirmation" class="label">Confirmar Contraseña</label> <input id="password_confirmation" name="password_confirmation" type="password" data-type="password" class="input" placeholder="Confirmar Contraseña" required> </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="tipopro">Tipo</label>
                      </div>
                      <select class="form-select" id="tipopro" name="tipopro" required>
                        <option value="" disabled>Selecione una categoria</option>

                        <option value="{{$tipos->idtipo}}">{{$tipos->descripciontipo}}</option>

                      </select>
                    </div>

                    <div class="group"> <input type="submit" class="button" value="Crear Cuenta" onclick="return validar()"> </div>
                    <div class="hr"></div>
                    <div class="foot"> <label for="tab-1">Ya tienes cuenta?</label> </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CARGA JQUERY POPPPERS Y JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{ url('/bootstrap/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{ url('/bootstrap/js/funciones.js')}}"></script>

</body>

</html>