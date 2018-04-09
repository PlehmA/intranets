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
</head>

<body>
<style>
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
    .show {display:block;}

    #myDropdown:hover{
        background-color: #d1ecf1;
        transition-delay: inherit;
    }
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
    .navbar {
      min-height: 100px;
      box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
      background-color: #f1f3f5;
    }
    .navbar .but-menu {
      width: 100px;
      height: 80px;
      box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
      display: inline-block;
      margin-left: 3px;
      margin-right: 3px;

    }
    .navbar a .but-menu {
      padding-left: 5px;
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
                <li>
                    <a href="rainloop" target="_blank">
                        <i class="material-icons">email</i>
                        <p>Correo</p>
                    </a>
                </li>
                <li id="accordion">
                    <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="material-icons">build</i>
                        <p>Herramientas</p>
                    </a>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <a href="#" id="menucito" class="col-lg-12 col-sm-12 col-md-12">
                            <i class="material-icons">folder_open</i>
                            <p>Tutoriales</p>
                        </a>
                        <a href="#" id="menucito" class="col-lg-12 col-sm-12 col-md-12">
                            <i class="material-icons">folder_open</i>
                            <p>Office</p>
                        </a>
                        <a href="#" id="menucito" class="col-lg-12 col-sm-12 col-md-12">
                            <i class="material-icons">folder_open</i>
                            <p>Mis Archivos</p>
                        </a>
                        <a href="www.google.com.ar" id="menucito" class="col-lg-12 col-sm-12 col-md-12">
                            <i class="material-icons">folder_open</i>
                            <p>Mis Archivos</p>
                        </a>
                        <br>
                    </div>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons">folder_open</i>
                        <p>Mis Archivos</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('calendar') }}">
                        <i class="material-icons">library_books</i>
                        <p>Calendario</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons">perm_contact_calendar</i>
                        <p>Directorio</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons">event</i>
                        <p>Novedades</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('configuracion') }}">
                        <i class="material-icons text-gray">settings</i>
                        <p>Configuración</p>
                    </a>
                </li>
                @if(Auth::user()->rol_usuario == 5)
                    <li>
                        <a href="{{ route('rrhh.personal') }}">
                            <i class="material-icons text-gray">people</i>
                            <p>Recursos Humanos</p>
                        </a>
                    </li>
                    @endif
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar" data-color="purple" data-image="{{ asset('img/sidebar-1.jpg') }}">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="row">
                      <a class="navbar-brand but-menu" href="{{ route('chat.index') }}">
                      <div class="col-md-1">
                        <i class="material-icons" style="font-size: 50px;">mail_outline</i>
                      </div>
                      </a>
                      <a class="navbar-brand but-menu" href="{{ route('chat.index') }}">
                      <div class="col-md-1">
                        <i class="material-icons" style="font-size: 50px;">contact_mail</i>
                      </div>
                      </a>
                    </div>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Avatar image -->
                        <div class="col-sm-2 col-md-3">
                          <img src="{{ url('storage/'.Auth::user()->username.'.jpg') }}" alt="" class="img-responsive img-circle">
                        </div>
                        <!-- Single button -->
                        <a class='dropdown-trigger1 btn' href='#' data-target='dropdown1'>{{ Auth::user()->name }}</a>
                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                          <li><a href="{{ url('/logout') }}">Log Out</a></li>
                        </ul>
                        <a class='dropdown-trigger btn' href='#' data-target='dropdown2'><i class="fas fa-angle-down"></i></a>
                        <!-- Dropdown Structure -->
                        <ul id='dropdown2' class='dropdown-content'>
                          <li><a href="#!">Configuración</a></li>
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
</body>
</html>
