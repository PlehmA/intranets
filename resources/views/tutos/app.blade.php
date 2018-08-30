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
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
  <!--  Material Dashboard CSS    -->
  <link href="{{ asset('css/material-dashboard.css?v=1.2.0') }}" rel="stylesheet" />
  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('css/correo.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&amp;subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css">
  <link rel="stylesheet" href="https://cdn.plyr.io/3.3.10/plyr.css">
  <link rel='stylesheet' href='{{ asset('css/stylenew.css') }}' />
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick/slick/slick.css"/>
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick/slick/slick-theme.css"/>

</head>

<body>
<style>
/* Dropdown Button */
.dropbtn {
    background-color: #ddd;
    color: #767676;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    margin-left: 15px;
    border-radius: 5px;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
    background-color: #ddd;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #ddd;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}

#myDropdown:hover{
    background-color: #d1ecf1;
    transition-delay: inherit;
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
.carousel.carousel-slider {
    top: 0;
    left: 0;
    margin-top: 100px;
}
.carousel .indicators {
    position: absolute;
    text-align: center;
    left: 0;
    right: 0;
    bottom: 0;
    margin: -23px;
}
.vertical-menu {
    width: 30vh;
    height: 700px;
    overflow-y: auto;
}
* {
  font-family: 'lunchtype21regular';
}
.btn-rojo {
  background-color: #DB6F7D;
}
.btn-verde {
  background-color: #95C086;
}
.btn-azul {
  background-color: #7FA1CA;
}
.btn-gris {
  background-color: #8F8E8F;
}
.btn-gris:hover {
  background-color: #adadad;
}
.input-group-btn {
  font-size: 67px;
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
.slick-list {
  position: relative;
  display: block;
  overflow: hidden;
  margin: 8px;
  padding: 0;
}
@media only screen and (max-width: 1400px) {

  .slick-list {
    position: relative;
    display: block;
    overflow: hidden;
    margin: 15px;
    margin-top: 0px;
    padding: 0;
    max-height: 250px
}
.sidebar .nav, .off-canvas-sidebar .nav {
    margin-top: 0px;
    margin-bottom: -8px;
}

  }


  .navbar.navbar-transparent {
    background-color: #f5f5f5;
    z-index: 999;
  }
  span.badge {
        min-width: 2rem;
        padding: 0 6px;
        margin-left: 14px;
        margin-top: -7px;
        text-align: center;
        font-size: 1rem;
        line-height: 22px;
        height: 22px;
        color: white;
        float: right;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        background-color: #DB6F7D;
    }
</style>
@yield('css')

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{ asset('img/barralateral.jpg') }}">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="logo">
            <a href="{{ route('dashboard') }}"> <img src="{{ asset('images/Recurso1.png') }}" class="img-responsive"> </a>
        </div>
        <div class="sidebar-wrapper">
<<<<<<< HEAD
                <ul class="nav">
                        <ul class="collapsible" style="background-color: transparent; color:grey;">
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
                              <span><a href="{{ route('plantillas.index') }}">Plantillas</a></span>
                            </div>
        
                          </li>
                          <a href="https://1drv.ms/f/s!Ao1bTBNbTk2Jf87ykAKAkUHulr4" target="_blank" style="color:grey">
                            <li>
                              <div class="collapsible-header">
                                <i class="material-icons">folder_open</i>
                                 <p>Mis Archivos</p>
                              </div>
        
                            </li>
                          </a>
                          <li onclick="location.href='{{ route('calendar.index') }}'">
                            <div class="collapsible-header"><i class="far fa-calendar-alt" style="color: #a9afbb; margin-right: 19px; font-size: 24px; margin-left: 4px; margin-top: 2px"></i>
                            <p>Calendario</p></div>
        
                          </li>
                          <li onclick="location.href='{{ route('directorio.index') }}'">
                            <div class="collapsible-header"><i class="material-icons">perm_contact_calendar</i>
                            <p>Agenda</p></div>
                          </li>
        
                          <li>
                                <div class="collapsible-header"><i class="material-icons text-gray">insert_drive_file</i> <p>Gestiones</p> </div>
                                <div class="collapsible-body">
                                  <span><a href="https://odontopraxis.freshdesk.com" target="_blank">Tickets</a></span><hr>
                                @if(5 != Auth::user()->rol_usuario && 1 != Auth::user()->tipo_rol)
                                  <span><a href="{{ route('autorizaciones.create') }}">Licencias</a></span><hr>
                                @endif
                                  <span><a href="{{ route('autorizaciones.index') }}">Registros</a></span>
                                </div>
            
                              </li>
        
                          <li onclick="location.href='{{ route('dashboard') }}'">
                            <div class="collapsible-header"><i class="fas fa-bullhorn" style="color: #a9afbb; margin-right: 19px; font-size: 20px; margin-left: 4px; margin-top: 2px"></i>
                            <p>Novedades</p></div>
        
                          </li>
                      @if(Auth::user()->rol_usuario == 5)
                          <li onclick="location.href='{{ route('rrhh.index') }}'">
                            <div class="collapsible-header">
                                  <i class="material-icons text-gray">people</i>
                                  <p>Recursos Humanos</p>
                            </div>
                          </li>
                          @endif
                          @if(Auth::user()->rol_usuario == 11)
                          <li onclick="location.href='{{ route('presidencia.index') }}'">
                            <div class="collapsible-header">
                                  <i class="material-icons text-gray">people</i>
                                  <p>Presidencia</p>
                            </div>
                          </li>
                          @endif
                          <li onclick="location.href='{{ route('configuracion') }}'">
                            <div class="collapsible-header"><i class="material-icons text-gray">lock</i>
                            <p>Seguridad</p></div>
        
                          </li>
                          @if(Auth::user()->rol_usuario == 12)
                            <li onclick="location.href='{{ route('noticia.index') }}'">
                                <div class="collapsible-header"><i class="material-icons text-gray">file_upload</i>
                                <p>Entradas</p></div>
            
                              </li>
                          @endif
                       
                          
                        </ul>
                    </ul>
                    {{-- Aca termina la barra lateral --}}
=======
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
                      <span><a href="{{ route('plantillas.index') }}">Plantillas</a></span>
                    </div>

                  </li>
                  <a href="https://1drv.ms/f/s!Ao1bTBNbTk2Jf87ykAKAkUHulr4" target="_blank" style="color:grey">
                    <li>
                      <div class="collapsible-header">
                        <i class="material-icons">folder_open</i>
                         <p>Mis Archivos</p>
                      </div>

                    </li>
                  </a>
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
                  @if(Auth::user()->rol_usuario == 11)
                  <li onclick="location.href='{{ route('presidencia.index') }}'">
                    <div class="collapsible-header">
                          <i class="material-icons text-gray">people</i>
                          <p>Presidencia</p>
                    </div>
                  </li>
                  @endif
              @if(Auth::user()->rol_usuario == 5)
                  <li onclick="location.href='{{ route('rrhh.index') }}'">
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
            <div class="autoplay">
              <div><img src="{{ asset('images/imagenprueba3.jpg') }}" alt="" class="img-rounded center-block"></div>
              <div><img src="{{ asset('images/imagenprueba2.jpg') }}" alt="" class="img-rounded center-block"></div>
              <div><img src="{{ asset('images/imagenprueba1.jpg') }}" alt="" class="img-rounded center-block"></div>
              <div><img src="{{ asset('images/imagenprueba1.jpg') }}" alt="" class="img-rounded center-block"></div>
              <div><img src="{{ asset('images/imagenprueba3.jpg') }}" alt="" class="img-rounded center-block"></div>
              <div><img src="{{ asset('images/imagenprueba2.jpg') }}" alt="" class="img-rounded center-block"></div>
            </div>
>>>>>>> f23b2c228454d36a27815af21f34176cd99d73b7
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
                        <a class="navbar-brand but-menu chat" href="{{ route('chats.index') }}" title="Chat!">
                        <img src="{{ asset('images/chats-atajo.png') }}" alt="" class="botonchat" >
                        @if ($count = $notificacion->count())
                          <span class="badge" style="color: white;">{{ $count }}</span>
                        @endif
                        </a>
                      </div>

                      <div class="col-md-2 .botonchat">
                        <a class="navbar-brand but-menu correo" href="{{ route('correo.index') }}" title="Correo!">
                        <img src="{{ asset('images/correo-atajo.png') }}" alt="" class="botonmail">
                        </a>
                      </div>

                      <div class="col-md-2">
                        <a class="navbar-brand but-menu notas" href="{{ route('chats.index') }}" title="Notas!">
                        <img src="{{ asset('images/misnotas-atajo.png') }}" alt="" class="botonchat">
                        </a>
                      </div>

                      <div class="col-md-2">
                        <a class="navbar-brand but-menu agenda" href="{{ route('directorio.index') }}" title="Agenda!">
                        <img src="{{ asset('images/agenda.png') }}" alt="" class="botonchat">
                        </a>
                      </div>
                    

                    </div>
                </div>
                <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right" id="imagenPerf">
                            <!-- Avatar image -->
                            <div class="row">
                                  <div class="col s2">
                                          <img src="{{ asset( Auth::user()->foto ) }}" alt="" onclick="location.href='{{ route('configuracion') }}'">
                
                                      </div>
                                      <div class="col s2">
                                            <a class='dropdown-trigger1 grey btn' href='#' data-target='dropdown1'>{{ Auth::user()->name }}</a>
                                            <!-- Dropdown Structure -->
                                            <ul id='dropdown1' class='dropdown-content'>
                                              <li><a href="{{ url('/logout') }}">Salir</a></li>
                                            </ul>
                                      </div>
                            </div>
                        </ul>
      
                      </div>
            </div>
        </nav>

            <div class="container-fluid" style="margin-top: 12vh;">

                @yield('content')

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/locale/ar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script src="https://unpkg.com/tippy.js@2.5.2/dist/tippy.all.min.js"></script>
<script src="https://cdn.plyr.io/3.3.10/plyr.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick/slick/slick.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
<script type="text/javascript">
   $('.dropdown-trigger').dropdown();
</script>
<script type="text/javascript">
   $('.dropdown-trigger1').dropdown();
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
 duration: 100,
});
 });
</script>
<script>
$(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>
<script>
tippy('.chat');
tippy('.correo');
tippy('.notas');
tippy('.agenda');
</script>
<script>const player = new Plyr('#player');</script>
<script>
$(document).ready(function(){
$('#buscador').keyup(function(){
   var nombres = $('.nombres');
   var buscando = $(this).val();
   var item='';
   for( var i = 0; i < nombres.length; i++ ){
       item = $(nombres[i]).html().toLowerCase();
       item = item.replace(new RegExp(/\s/g),"");
       item = item.replace(new RegExp(/[àáâãäå]/g),"a");
       item = item.replace(new RegExp(/[èéêë]/g),"e");
       item = item.replace(new RegExp(/[ìíîï]/g),"i");
       item = item.replace(new RegExp(/ñ/g),"n");
       item = item.replace(new RegExp(/[òóôõö]/g),"o");
       item = item.replace(new RegExp(/[ùúûü]/g),"u");
        for(var x = 0; x < item.length; x++ ){
            if( buscando.length == 0 || item.indexOf( buscando ) > -1 ){
                $(nombres[i]).parents('.collection').show();
            }else{
                 $(nombres[i]).parents('.collection').hide();
            }
        }
   }
});
});
</script>
@yield('script')
<script>
$(document).ready(function() {
  $('.autoplay').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
      });
});
</script>
</body>
</html>
