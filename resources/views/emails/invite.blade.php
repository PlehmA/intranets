<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title>Hola!!!</title>
  </head>
  <body>
    <div class="container">
      <div style="text-align: center;">
        <img src="{{ asset('images/Recurso1.png') }}" alt="">
        <h1>Invitación de {{ Auth::user()->name }} a evento.</h1>
      </div>
        <div style="text-align: center;">
          <p style="text-align: center; font-size: 20px;">{{ Auth::user()->name }} te ha invitado a participar de un envento.</p>
          @foreach ($calendar as $cal)
              <p style="text-align: center; font-size: 20px;">Nombre del evento: {{ $cal }}</p>
          @endforeach

        </div>

    </div>


  </body>
</html>
