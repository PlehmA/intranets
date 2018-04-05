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
        background: url({{ url('/img/logueoproporcionado.jpg') }}) no-repeat;
        background-size: cover;
    }
    .botoncito {
      background: url({{ url('img/botoningreso.jpg') }});
      background-size: 280px 80px;
    }
    .btn {
      width: 280px;
      height: 80px;
    }
</style>
<div id="app">

    <main class="py-4">
        <div class="container">
            <div class="col-sm-8" style="margin-top: 45%; margin-left: 35%">
                <form action="{{ url('inicio') }}" method="post">
                    @csrf
                    <input type="hidden" name="ipVisitor" value="{{ $_SERVER['REMOTE_ADDR'] }}">
                    <input type="submit" class="btn botoncito" value="">
                </form>
            </div>
        </div>
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
