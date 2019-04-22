<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/faviconuitalk.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/faviconuitalk.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Uitalk</title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel='stylesheet' href='{{ asset('css/stylenew.css') }}' />

</head>

<body>
<style>

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
    /* Dropdown Button */
    .dropbtn {
        background-color: #e5e6e7;
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
        background-color: #e5e6e7;
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
        background-color: #e5e6e7;
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

    .cajaloca {
        border-width: 1px;
        margin: 0 20rem 0 20rem;
        background-color: #f2f2f2;
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
  
    .navbar .but-menu {
      display: inline-block;
      margin-left: 0px;
      margin-right: 0px;
    }
    .navbar a .but-menu {
      padding-left: 0px;
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
    .pagination li a {
      background-color: #e0e0e0;
    }
    .pagination .disabled a {
      background-color: #e0e0e0;
    }
    .pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover {
    background-color: #e0e0e0;
    }
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
      background-color: #878787;
      border-color: #878787;
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

    select{
      display: block;
    }

    .main-panel{
      overflow: auto;
    }
</style>
<div class="wrapper">
  <div class="sidebar" data-color="purple" data-image="{{ asset('img/barralateral.png') }}">

    <div class="sidebar-wrapper">
      @include('layouts.rutas')
        {{-- Aca termina la barra lateral --}}
    </div>
</div>
    <div class="main-panel">
      <nav class="navbar navbar-transparent">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="row menu-top">

                  <div class="col s2">
                    <a class="navbar-brand but-menu chat" href="{{ url('/uichat') }}" title="Chat">
                      <img src="{{ asset('images/chats-atajo.png') }}" alt="" class="botonchat" >

                      <span class="badge noticount" style="color: white;"></span>

                    </a>
                  </div>

                  <div class="col s2">
                    <a class="navbar-brand but-menu correo" href="{{ route('correo.index') }}" title="Correo">
                    <img src="{{ asset('images/correo-atajo.png') }}" alt="" class="botonmail">
                    </a>
                  </div>

                  <div class="col s2">
                    <a class="navbar-brand but-menu notas no-autoinit" href="{{ route('notes.index') }}" title="Notas">
                    <img src="{{ asset('images/misnotas-atajo.png') }}" alt="" class="botonchat">
                    </a>
                  </div>

                  <div class="col s2">
                    <a class="navbar-brand but-menu agenda" href="{{ route('directorio.index') }}" title="Agenda" id="agenda">
                    <img src="{{ asset('images/agenda.png') }}" alt="" class="botonchat">
                    </a>
                  </div>
                 
                </div>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right" id="imagenPerf">
                  <!-- Avatar image -->
                  <div class="row menu-top-right">
                        <div class="col s2">
                                <img src="{{ asset( Auth::user()->foto ) }}" alt="">
      
                            </div>
                            <div class="col s2">
                                  <a class='dropdown-trigger1 grey btn hoverable' href='#' data-target='dropdown1'>{{ Auth::user()->name }}</a>
                                  <!-- Dropdown Structure -->
                                  <ul id='dropdown1' class='dropdown-content'>
                                    <li><a href="{{ url('/logout') }}" class="white-text grey">Salir</a></li>
                                  </ul>
                            </div>
                  </div>
              </ul>

            </div>
        </div>
    </nav>
        <div class="content">
         

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
<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('js/material-dashboard.js?v=1.2.0') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/demo.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.js"></script>
<script src="https://unpkg.com/tippy.js@2.5.2/dist/tippy.all.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
<script type="text/javascript">
   $('.dropdown-trigger1').dropdown();
</script>
<script src="{{ asset('js/sidebar.js') }}"></script>
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
<script>
$(document).ready(function(){
  $('.modal').modal();
});
</script>
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
@yield('script')
<script type="text/javascript">
    var count = {{$notificacion->count()}};
   
    document.addEventListener("DOMContentLoaded", function (){
   if (count >= 1) {
       let url = "{{ url('/uichat') }}";
     var notifications = new Notification("Uitalk", {
   
   icon: "{{ asset('images/Recurso1.png') }}",
   body: "Tienes "+count+" mensajes nuevos en el chat.",
   url: url
   });
     
   
   
        if (Notification.permission !== "granted") {
       Notification.requestPermission();
     }else{ 
       
      notifications.onclick = function(){
       window.open(url);
     } 
     
    }   
   }
       });
     </script>
<script>
  $(document).ready(function () {
    setInterval(function(){ 
      axios.get('/api/notificaciones')
  .then(function (response) {
    // handle success
    // console.log(response.data.todos.length);
    if (response.data.todos.length >= 1) {
      $('.noticount').css('display', 'inline-block');
      $('.noticount').html(response.data.todos.length);
      $('title').html('('+response.data.todos.length+')Uitalk');
    }else{
      $('.noticount').css('display', 'none');
      $('title').html('Uitalk');
    }
    
  });
  }, 1000);
  
  });
  </script>

</body>
</html>
