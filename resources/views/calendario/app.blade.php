<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}" />
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />
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
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('css/correo.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&amp;subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<link rel='stylesheet' href='{{ asset('css/fullcalendar.css') }}' />
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
div .botonchat {
  width: 60;
  height: 40px;
  margin-top: 5px;
}
div .botonmail {
  width: 50;
  height: 30px;
  margin-top: 10px;
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
</style>
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
            <ul class="nav">
              <ul class="collapsible" style="background-color: transparent;">
                <li onclick="location.href='{{ route('correo.index') }}'">
                  <div class="collapsible-header">
                    <i class="material-icons">email</i>
                    <p>Correo</p>
                  </div>

                </li>
                <li>
                  <div class="collapsible-header"><i class="material-icons">filter_drama</i> <p>Herramientas</p> </div>
                  <div class="collapsible-body">
                    <span><a href="{{ route('tutos.index') }}">Tutoriales</a></span><hr>
                    <span><a href="#">Office</a></span><hr>
                    <span><a href="#">Organigrama corporativo</a></span><hr>
                    <span><a href="#">Plantillas</a></span>
                  </div>

                </li>
                <li>
                  <div class="collapsible-header">
                    <i class="material-icons">folder_open</i>
                     <p>Mis Archivos</p>
                  </div>

                </li>
                <li onclick="location.href='{{ route('calendar.index') }}'">
                  <div class="collapsible-header"><i class="material-icons">library_books</i>
                  <p>Calendario</p></div>

                </li>
                <li onclick="location.href='{{ route('directorio.index') }}'">
                  <div class="collapsible-header"><i class="material-icons">perm_contact_calendar</i>
                  <p>Agenda</p></div>

                </li>
                <li onclick="#">
                  <div class="collapsible-header"><i class="material-icons">event</i>
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
                  <div class="collapsible-header"><i class="material-icons text-gray">settings</i>
                  <p>Configuración</p></div>

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

                      <div class="col-md-3">
                        <a class="navbar-brand but-menu chat" href="{{ route('chats.index') }}" title="Chat!">
                        <img src="{{ asset('images/chats-atajo.png') }}" alt="" class="botonchat" >
                        </a>
                      </div>

                      <div class="col-md-3 .botonchat">
                        <a class="navbar-brand but-menu correo" href="{{ route('correo.index') }}" title="Correo!">
                        <img src="{{ asset('images/correo-atajo.png') }}" alt="" class="botonmail">
                        </a>
                      </div>

                      <div class="col-md-3">
                        <a class="navbar-brand but-menu notas" href="{{ route('chats.index') }}" title="Notas!">
                        <img src="{{ asset('images/misnotas-atajo.png') }}" alt="" class="botonchat">
                        </a>
                      </div>

                      <div class="col-md-3">
                        <a class="navbar-brand but-menu agenda" href="{{ route('directorio.index') }}" title="Agenda!">
                        <img src="{{ asset('images/tareaspendientes-atajo.png') }}" alt="" class="botonchat">
                        </a>
                      </div>

                    </div>
                </div>
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
                      <!-- Avatar image -->
                      <div class="col-sm-2 col-md-3 dropdown">

                        <img src="{{ url( Auth::user()->foto ) }}" alt="" class="img-responsive img-circle" style="width: 160px; height: 70px;">

                        <div class="dropdown-content">
                          <img src="winlogo.png" alt="Windows Logo" width="300" height="200">
                          <div class="desc">Microsoft's OS Logo since Windows 8</div>
                        </div>

                      </div>

                      <!-- Dropdown Structure -->
                      <ul id='dropdown2' class='dropdown-content'>
                        <li><a href="#!">Configuración</a></li>
                      </ul>
                      <a class='dropdown-trigger1 green btn' href='#' data-target='dropdown1'>{{ Auth::user()->name }}</a>
                      <!-- Dropdown Structure -->
                      <ul id='dropdown1' class='dropdown-content'>
                        <li><a href="{{ url('/logout') }}">Log Out</a></li>
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
<script>
  $(document).ready(function() {
    $(".dropdown").on("click", .dropdown());
  });
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
  tippy('.chat');
  tippy('.correo');
  tippy('.notas');
  tippy('.agenda');
</script>
<script>
$(document).ready(function() {

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var calendar = $('#calendar').fullCalendar({
      locale: 'es',
      monthNames: [
         'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
        'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ],
      header: {
        left: 'prev,next today, BotonEvento',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      customButtons: {
        BotonEvento: {
          text: "Agregar Evento",
          click: function(){
            $('#modal1').modal();
          },
        }
      },
      selectable: true,
      selectHelper: true,
        eventRender: function(event, element){
          element.popover({
              animation:true,
              delay: 300,
              content: '<b>Inicio</b>:'+event.start+"<b>Fin</b>:"+event.end,
              trigger: 'hover'
          });
        },
        dayClick: function(date, jsEvent, view) {
          $("#myModal").modal();
          },
      // select: function(start, end, allDay) {
      //   var title = prompt('Nombre del evento:');
      //   if (title) {
      //     calendar.fullCalendar('renderEvent',
      //       {
      //         title: title,
      //         start: start,
      //         end: end,
      //         allDay: allDay
      //       },
      //       true // make the event "stick"
      //     );
      //   }
      //   calendar.fullCalendar('unselect');
      // },
      editable: true,

    });

  });

</script>
@yield('jsscript')
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
