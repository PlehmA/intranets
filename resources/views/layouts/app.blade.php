<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Intranet</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('css/material-dashboard.css?v=1.2.0') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
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
</style>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{ asset('img/sidebar-1.jpg') }}">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="logo">
            <a href="#" class="simple-text">
                Odontopraxis
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="{{ system('outlook') }}">
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
                        <a href="#" id="menucito">
                            <i class="material-icons">folder_open</i>
                            <p>Tutoriales</p>
                        </a>
                        <a href="#" id="menucito">
                            <i class="material-icons">folder_open</i>
                            <p>Office</p>
                        </a>
                        <a href="#" id="menucito">
                            <i class="material-icons">folder_open</i>
                            <p>Mis Archivos</p>
                        </a>
                        <a href="www.google.com.ar" id="menucito">
                            <i class="material-icons">folder_open</i>
                            <p>Mis Archivos</p>
                        </a>
                    </div>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons">folder_open</i>
                        <p>Mis Archivos</p>
                    </a>
                </li>
                <li>
                    <a href="#">
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
                    <a href="#">
                        <i class="material-icons text-gray">settings</i>
                        <p>Configuración</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> Intranet </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Single button -->
                        <div class="dropdown">
                            <button onclick="myFunction()" class="dropbtn">Andres Plehm</button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="#">Log Out</a>
                            </div>
                        </div>
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('js/material-dashboard.js?v=1.2.0') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/demo.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
<script>
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
</body>
</html>