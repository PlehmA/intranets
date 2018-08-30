<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Intranet</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body>
<style>
* {
  font-family: 'Roboto', sans-serif;
}
    body {
      background: url({{ url('/img/logueoproporcionado.jpg') }}) no-repeat;
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-color: #66999;
    }
    .tarj-login {
      margin-top: 30%;
      margin-left: 25%;
    }
    .botoncito {
      background: url({{ url('img/botoningreso.png') }});
      background-size: 140px 40px;
    }
    .btn {
      width: 140px;
      height: 40px;
    }
</style>
<div id="app">
    <div class="container">
        <div class="col-md-6 tarj-login">
            <div class="card card-header">
                Acceso
            </div>
            <div class="card card-header">
              @if (session('errorses'))
                  <div class="container alert alert-warning text-center" role="alert" data-dismiss="alert">
                      {{ session('errorses') }}
                  </div>
              @endif
                <form action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group mx-auto text-center" {{ $errors->has('email') ? 'has-error' : '' }}>
                        <input type="text" name="username" id="username" placeholder="Nombre de Usuario" value="{{ old('username') }}" class="form-control" required>
                    </div>
                        {!! $errors->first('username', '<span class="help-block">:message</span>') !!}
                    <div class="form-group mx-auto text-center" {{ $errors->has('password') ? 'has-error' : '' }}>
                        <input type="password" name="password" id="password" placeholder="Contraseña" class="form-control" required>
                    </div>
                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                    <div class="form-group mx-auto text-center">
                        <input type="submit" class="btn botoncito" name="submit" value="">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
        var miliSegundos = 18000
      setTimeout(function(){
        window.location.assign('{{ url('inicioder') }}');
      }, miliSegundos);
    </script>
</body>
</html>
