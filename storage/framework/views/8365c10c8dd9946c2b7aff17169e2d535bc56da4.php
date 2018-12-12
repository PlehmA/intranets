<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('img/faviconuitalk.png')); ?>" />
  <link rel="icon" type="image/png" href="<?php echo e(asset('img/faviconuitalk.png')); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Uitalk </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name="viewport" content="width=device-width" />
  <!-- Bootstrap core CSS     -->
  <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" />
  <!--  Material Dashboard CSS    -->
  <link href="<?php echo e(asset('css/material-dashboard.css?v=1.2.0')); ?>" rel="stylesheet" />
  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="<?php echo e(asset('css/demo.css')); ?>" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/correo.css')); ?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&amp;subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('css/materialize.css')); ?>">
  <link rel='stylesheet' href='<?php echo e(asset('css/stylenew.css')); ?>' />
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick/slick/slick.css"/>
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick/slick/slick-theme.css"/>
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.0/css/autoFill.dataTables.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<?php echo $__env->yieldContent('header'); ?>
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

#agenda {
  margin-left: 0px;
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
a:active {
  background-color: transparent !important;
}
.slick-list {
  position: relative;
  display: block;
  overflow: hidden;
  margin: 8px;
  padding: 0;
}
@media  only screen and (max-width: 1400px) {

  .slick-list {
    position: relative;
    display: block;
    margin: 15px;
    margin-top: 0px;
    padding: 0;
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
img.agenda-icon{
  width: 22px;
  height: 26px;
  margin-left: 2px;
  margin-right: 21px;
}
</style>
<?php echo $__env->yieldContent('css'); ?>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php echo e(asset('img/barralateral.png')); ?>">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="logo">
            <a href="<?php echo e(route('dashboard')); ?>"> <img src="<?php echo e(asset('images/Recurso1.png')); ?>" class="img-responsive"> </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <ul class="collapsible" style="background-color: transparent; color:grey;">
                  <li onclick="location.href='<?php echo e(route('correo.index')); ?>'">
                    <div class="collapsible-header">
                        <img src="<?php echo e(asset('images/correo-atajo.png')); ?>" class="correo-icon">
                      <p>Correo</p>
                    </div>

                  </li>
                  <li>
                    <div class="collapsible-header"><i class="material-icons">build</i> <p>Herramientas</p> </div>
                    <div class="collapsible-body">
                      <span><a href="<?php echo e(route('tutos.index')); ?>" class="grey-text text-darken-2">Tutoriales</a></span><hr>
                      
                      <span><a href="<?php echo e(route('plantillas.index')); ?>" class="grey-text text-darken-2">Plantillas</a></span>
                    </div>

                  </li>
                  <a href="<?php echo e(url(Auth::user()->dir_onedrive)); ?>" target="_blank" style="color:grey">
                    <li>
                      <div class="collapsible-header">
                        <i class="material-icons">folder_open</i>
                         <p>Mis Archivos</p>
                      </div>

                    </li>
                  </a>
                  <li onclick="location.href='<?php echo e(route('calendar.index')); ?>'">
                    <div class="collapsible-header"><i class="far fa-calendar-alt" style="color: #a9afbb; margin-right: 19px; font-size: 24px; margin-left: 4px; margin-top: 2px"></i>
                    <p>Calendario</p></div>

                  </li>
                  <li onclick="location.href='<?php echo e(route('directorio.index')); ?>'">
                    <div class="collapsible-header">
                        <img src="<?php echo e(asset('images/agenda_icon.png')); ?>" class="agenda-icon">
                    <p>Agenda</p></div>
                  </li>

                  <li>
                        <div class="collapsible-header"><i class="material-icons text-gray">insert_drive_file</i> <p>Gestiones</p> </div>
                        <div class="collapsible-body">
                          <span><a href="<?php echo e(url('tickets')); ?>" class="grey-text text-darken-2">Tickets</a></span><hr>
                          <span><a href="<?php echo e(url('registroticket')); ?>" class="grey-text text-darken-2">Registro de tickets</a></span><hr>
                        <?php if(1 != Auth::user()->tipo_rol): ?>
                          <span><a href="<?php echo e(route('autorizaciones.create')); ?>" class="grey-text text-darken-2">Licencias</a></span><hr>
                        <?php endif; ?>
                          <span><a href="<?php echo e(route('autorizaciones.index')); ?>" class="grey-text text-darken-2">Registro de licencias</a></span>
                        </div>
    
                      </li>

                  <li onclick="location.href='<?php echo e(route('dashboard')); ?>'">
                    <div class="collapsible-header"><i class="fas fa-bullhorn" style="color: #a9afbb; margin-right: 19px; font-size: 20px; margin-left: 4px; margin-top: 2px"></i>
                    <p>Novedades</p></div>

                  </li>
                  <?php if(Auth::user()->rol_usuario == 5 && Auth::user()->tipo_rol == 2|| 'aplehm' == Auth::user()->username || 'ipicoy' == Auth::user()->username || 'ppalermo' == Auth::user()->username): ?>
                  <li onclick="location.href='<?php echo e(route('rrhh.index')); ?>'">
                    <div class="collapsible-header">
                          <i class="material-icons text-gray">people</i>
                          <p>Recursos Humanos</p>
                    </div>
                  </li>
                  <?php endif; ?>
                  <?php if(Auth::user()->rol_usuario == 11): ?>
                  <li onclick="location.href='<?php echo e(route('presidencia.index')); ?>'">
                    <div class="collapsible-header">
                          <i class="material-icons text-gray">people</i>
                          <p>Presidencia</p>
                    </div>
                  </li>
                  <?php endif; ?>
                  <li onclick="location.href='<?php echo e(route('configuracion')); ?>'">
                    <div class="collapsible-header"><i class="material-icons text-gray">lock</i>
                    <p>Seguridad</p></div>

                  </li>
                  <?php if(Auth::user()->rol_usuario == 12 || Auth::user()->rol_usuario == 3 &&  Auth::user()->username != 'udemo'): ?>
                    <li onclick="location.href='<?php echo e(route('noticia.index')); ?>'">
                        <div class="collapsible-header"><i class="material-icons text-gray">file_upload</i>
                        <p>Entradas</p></div>
    
                      </li>
                  <?php endif; ?>
                  <li>
                        <div class="collapsible-header"><i class="fas fa-door-open" style="color: #a9afbb; margin-right: 19px; font-size: 20px; margin-left: 4px; margin-top: 2px"></i>
                            <p>Accesos</p></div>
                        <div class="collapsible-body">
                          <span><a href="http://192.168.0.8:8080/PREPAGA" target="_blank" class="grey-text text-darken-2">ThinkSoft</a></span><hr>

                    
                        </div>
    
                      </li>
               
                  
                </ul>
            </ul>
            
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
                    <div class="row">

                      <div class="col s2">
                        <a class="navbar-brand but-menu chat" href="<?php echo e(url('/uichat')); ?>" title="Chat">
                          <img src="<?php echo e(asset('images/chats-atajo.png')); ?>" alt="" class="botonchat" >

                          <span class="badge noticount" style="color: white;"></span>

                        </a>
                      </div>

                      <div class="col s2">
                        <a class="navbar-brand but-menu correo" href="<?php echo e(route('correo.index')); ?>" title="Correo">
                        <img src="<?php echo e(asset('images/correo-atajo.png')); ?>" alt="" class="botonmail">
                        </a>
                      </div>

                      <div class="col s2">
                        <a class="navbar-brand but-menu notas no-autoinit" href="<?php echo e(route('notes.index')); ?>" title="Notas">
                        <img src="<?php echo e(asset('images/misnotas-atajo.png')); ?>" alt="" class="botonchat">
                        </a>
                      </div>

                      <div class="col s2">
                        <a class="navbar-brand but-menu agenda" href="<?php echo e(route('directorio.index')); ?>" title="Agenda" id="agenda">
                        <img src="<?php echo e(asset('images/agenda.png')); ?>" alt="" class="botonchat">
                        </a>
                      </div>
                     
                    </div>
                </div>
                <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-right" id="imagenPerf">
                      <!-- Avatar image -->
                      <div class="row">
                            <div class="col s2">
                                    <img src="<?php echo e(asset( Auth::user()->foto )); ?>" alt="">
          
                                </div>
                                <div class="col s2">
                                      <a class='dropdown-trigger1 grey btn hoverable' href='#' data-target='dropdown1'><?php echo e(Auth::user()->name); ?></a>
                                      <!-- Dropdown Structure -->
                                      <ul id='dropdown1' class='dropdown-content'>
                                        <li><a href="<?php echo e(url('/logout')); ?>" class="white-text grey">Salir</a></li>
                                      </ul>
                                </div>
                      </div>
                  </ul>

                </div>
            </div>
        </nav>
        <div class="content">

                <?php echo $__env->yieldContent('content'); ?>

        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="<?php echo e(asset('js/material.min.js')); ?>" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="<?php echo e(asset('js/chartist.min.js')); ?>"></script>
<!--  Dynamic Elements plugin -->
<script src="<?php echo e(asset('js/arrive.min.js')); ?>"></script>
<!--  PerfectScrollbar Library -->
<script src="<?php echo e(asset('js/perfect-scrollbar.jquery.min.js')); ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo e(asset('js/bootstrap-notify.js')); ?>"></script>
<!--  Google Maps Plugin    -->
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo e(asset('js/material-dashboard.js?v=1.2.0')); ?>"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo e(asset('js/demo.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/locale/ar.js"></script>
<script src="<?php echo e(asset('js/materialize.js')); ?>"></script>
<script src='<?php echo e(asset('js/fullcalendar.js')); ?>'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/6.3.3/video.js"></script>
<script src="https://unpkg.com/tippy.js@2.5.2/dist/tippy.all.min.js"></script>
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
    window.location.assign('<?php echo e(url('/logout')); ?>');
  }, miliSegundos);
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
<script>
$(document).ready(function() {
  $('.autoplay').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      adaptiveHeight: true,
    });
});
</script>
<?php echo $__env->yieldContent('javascript'); ?>
<script>
  $('.wrapper').perfectScrollbar('destroy');
  $('.sidebar').perfectScrollbar('destroy');
  $('.sidebar .sidebar-wrapper, .off-canvas-sidebar .sidebar-wrapper').perfectScrollbar('destroy');

</script>
<script type="text/javascript">
    var count = <?php echo e($notificacion->count()); ?>;
   
    document.addEventListener("DOMContentLoaded", function (){
   if (count >= 1) {
       let url = "<?php echo e(url('/uichat')); ?>";
     var notifications = new Notification("Uitalk", {
   
   icon: "<?php echo e(asset('images/Recurso1.png')); ?>",
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
