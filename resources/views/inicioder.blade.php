<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Intranet') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body>
<style>
    body {
        background: url({{ url('/img/logueolimpio.jpg') }}) no-repeat;

        background-size: cover; 
    }
</style>
<div id="app">
    <div class="container">
        <div class="mt-5 col-6 float-right">
            <div class="card card-header text-white">
                Login Manual
            </div>
            <div class="card card-header">
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
                        <input type="submit" class="btn" name="submit">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
