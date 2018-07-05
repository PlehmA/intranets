<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/Isologotipo.png') }}" />
  <link rel="icon" type="image/png" href="{{ asset('img/Isologotipo.png') }}" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Intranet</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width" />
  <!-- Bootstrap core CSS     -->
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
  <!--  Material Dashboard CSS    -->
  <link href="{{ asset('css/material-dashboard.css?v=1.2.0') }}" rel="stylesheet" />
  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('css/correo.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&amp;subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<link rel='stylesheet' href='{{ asset('css/fullcalendar.css') }}' />
<link rel='stylesheet' href='{{ asset('css/stylenew.css') }}' />
</head>

<body>
<style>
/* Dropdown Button */
.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
}
.desc {
  padding: 15px;
  text-align: center;
}
.dropdown:hover .dropdown-content {
  display: block;
}
.cajaloca {

}
.caja-1 {
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
}
.caja-2 {
    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.caja-3 {
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
}
.caja-4 {
    box-shadow: 0 16px 28px 0 rgba(0, 0, 0, 0.22), 0 25px 55px 0 rgba(0, 0, 0, 0.21);
}
.caja-5 {
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
}

div .botonchat:hover {
  -webkit-transform:scale(1.25);
  -moz-transform:scale(1.25);
  -ms-transform:scale(1.25);
  -o-transform:scale(1.25);
  transform:scale(1.25);
}
div .botonmail:hover {
  -webkit-transform:scale(1.25);
  -moz-transform:scale(1.25);
  -ms-transform:scale(1.25);
  -o-transform:scale(1.25);
  transform:scale(1.25);
}
#agenda {
  margin-left: -3px;
}
.sidebar .nav, .off-canvas-sidebar .nav{
  margin-top: 0px;
}
.sidebar .logo, .off-canvas-sidebar .logo {
      padding: 6px 15px;
}
.sidebar .logo:after, .off-canvas-sidebar .logo:after{
  background-color: initial;
}
</style>
@yield('css')
<div class="wrapper" id="app">
    <div class="sidebar" data-color="purple" data-image="{{ asset('img/barralateral.jpg') }}">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="logo">
            <a href="{{ route('dashboard') }}"> <img src="{{ asset('images/Recurso1.png') }}" class="img-responsive"> </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
              <ul class="collapsible" style="background-color: transparent;">
                <li onclick="location.href='{{ route('correo.index') }}'">
                  <div class="collapsible-header">
                    <i class="material-icons">email</i>
                    <p>Correo</p>
                  </div>

                </li>
                <li>
                  <div class="collapsible-header"><i class="material-icons">build</i> <p>Herramientas</p> </div>
                  <div class="collapsible-body">
                    <span><a href="{{ route('tutos.index') }}">Tutoriales</a></span><hr>
                    <span><a href="{{ route('organigrama.index') }}">Organigrama corporativo</a></span><hr>
                    <span><a href="#">Plantillas</a></span>
                  </div>

                </li>
                <li onclick="location.href='https://onedrive.live.com/redir.aspx?cid=894d4e5b134c5b8d&resid=894D4E5B134C5B8D!127&parId=894D4E5B134C5B8D!103&authkey=!AH5wVptKgauSqJo'">
                  <div class="collapsible-header">
                    <i class="material-icons">folder_open</i>
                     <p>Mis Archivos</p>
                  </div>

                </li>
                <li onclick="location.href='{{ route('calendar.index') }}'">
                  <div class="collapsible-header"><i class="far fa-calendar-alt" style="color: #a9afbb; margin-right: 19px; font-size: 24px; margin-left: 4px; margin-top: 2px"></i>
                  <p>Calendario</p></div>

                </li>
                <li onclick="location.href='{{ route('directorio.index') }}'">
                  <div class="collapsible-header"><i class="material-icons">perm_contact_calendar</i>
                  <p>Agenda</p></div>

                </li>
                <li onclick="location.href='{{ route('dashboard') }}'">
                  <div class="collapsible-header"><i class="fas fa-bullhorn" style="color: #a9afbb; margin-right: 19px; font-size: 20px; margin-left: 4px; margin-top: 2px"></i>
                  <p>Novedades</p></div>

                </li>
            @if(Auth::user()->rol_usuario == 5)
                <li onclick="location.href='{{ route('rrhh.personal') }}'">
                  <div class="collapsible-header">
                        <i class="material-icons text-gray">people</i>
                        <p>Recursos Humanos</p>
                  </div>
                </li>
                @endif
                <li onclick="location.href='{{ route('configuracion') }}'">
                  <div class="collapsible-header"><i class="material-icons text-gray">lock</i>
                  <p>Seguridad</p></div>

                </li>
              </ul>
            </ul>
            <div class="carousel carousel-slider">
               <a class="carousel-item" href="#one!"><img src="{{ url('images/maxresdefault.jpg') }}"></a>
               <a class="carousel-item" href="#two!"><img src="{{ url('images/maxresdefault.jpg') }}"></a>
               <a class="carousel-item" href="#three!"><img src="{{ url('images/maxresdefault.jpg') }}"></a>
               <a class="carousel-item" href="#four!"><img src="{{ url('images/maxresdefault.jpg') }}"></a>
             </div>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12); min-height: 90px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="row">

                      <div class="col-md-2">
                        <a class="navbar-brand but-menu chat" href="{{ route('chats.index') }}" title="Chat">
                        <img src="{{ asset('images/chats-atajo.png') }}" alt="" class="botonchat" >
                        </a>
                      </div>

                      <div class="col-md-2 .botonchat">
                        <a class="navbar-brand but-menu correo" href="{{ route('correo.index') }}" title="Correo">
                        <img src="{{ asset('images/correo-atajo.png') }}" alt="" class="botonmail">
                        </a>
                      </div>

                      <div class="col-md-2">
                        <a class="navbar-brand but-menu notas" href="{{ route('notes.index') }}" title="Notas">
                        <img src="{{ asset('images/misnotas-atajo.png') }}" alt="" class="botonchat">
                        </a>
                      </div>

                      <div class="col-md-2">
                        <a class="navbar-brand but-menu agenda" href="{{ route('directorio.index') }}" title="Agenda">
                        <img src="{{ asset('images/agenda.png') }}" alt="" class="botonchat">
                        </a>
                      </div>

                    </div>
                </div>
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
                      <!-- Avatar image -->
                      <div class="col-sm-2 col-md-3 dropdown">

                        <a href="{{ route('configuracion') }}" id="imagenPerf">
                          <img src="{{ url( Auth::user()->foto ) }}" alt="" class="img-responsive">
                        </a>

                      </div>

                      <!-- Dropdown Structure -->
                      <ul id='dropdown2' class='dropdown-content'>
                        <li><a href="#!">Seguridad</a></li>
                      </ul>
                      <a class='dropdown-trigger1 grey btn' href='#' data-target='dropdown1'>{{ Auth::user()->name }}</a>
                      <!-- Dropdown Structure -->
                      <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="{{ url('/logout') }}">Salir</a></li>
                      </ul>

                  </ul>

                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">

                @yield('content')

            </div>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="{{ asset('js/chartist.min.js') }}"></script>
<!--  Dynamic Elements plugin -->
<script src="{{ asset('js/arrive.min.js') }}"></script>
<!--  PerfectScrollbar Library -->
<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>
<!--  Google Maps Plugin    -->
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('js/material-dashboard.js?v=1.2.0') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/demo.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script src='{{ asset('js/momentcalendar.min.js') }}'></script>
<script src='{{ asset('js/fullcalendar.js') }}'></script>
<script src='{{ asset('js\locale-all.js') }}'></script>
<script src="https://unpkg.com/tippy.js@2.5.2/dist/tippy.all.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>

<script type="text/javascript">
   $('.dropdown-trigger1').dropdown();

   $(document).ready(function(){
       $('.collapsible').collapsible();
     });
   </script>
</script>

<script>
  var miliSegundos = 1800000
  setTimeout(function(){
    alert('Ha pasado el tiempo de sesión, vuelva a conectarse');
    window.location.assign('{{ url('/logout') }}');
  }, miliSegundos);
</script>
<script type="text/javascript">
$(document).ready(function(){
$('.carousel.carousel-slider').carousel({
 fullWidth: true,
 indicators: true,
 duration: 203,
});
 });
</script>

<script>
  tippy('.chat');
  tippy('.correo');
  tippy('.notas');
  tippy('.agenda');
</script>

@yield('jsscript')

</body>
</html>
