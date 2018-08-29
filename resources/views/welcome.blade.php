<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Intranet</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head>
<body>
<style>
* {
  font-family: 'Roboto', sans-serif;
}
    body {
        background: url({{ url('/img/logueoproporcionado.jpg') }}) no-repeat;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-color: #66999;

    }
    .botoncito {
      background: url({{ url('img/botoningreso.png') }});
      background-size: 190px 60px;
    }
    .btn {
      width: 190px;
      height: 60px;
    }
@media screen and (min-width: 1400px){
    .formubtn{
        margin-top: 45%; 
        margin-left: 35%
    }
    .formuterminos{
        margin-top: 5%; margin-left: 27%
    }
    .alert{
        background-color: #d9d9d9;
        margin-left: -15vh;
        width: 48vh;
    }
}
@media screen and (max-width: 1400px){
    .formubtn{
        margin-top: 30%; 
        margin-left: 38%
    }
    .formuterminos{
        margin-top: 1%; margin-left: 27%
    }
    .alert{
        background-color: #d9d9d9;
        margin-left: -8vh;
        width: 48vh;
    }
}
.modals {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 5000; /* Sit on top */
    padding-top: 1vh; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* modals Content */
.modals-content {
    background-color: #e0e0e0;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 38%;
}
/* Modal Footer */
.modal-footer {
    padding: 2px 16px;
    background-color: #e0e0e0;
    color: white;
}

/* The Close Button */
.close {
    color: #000000;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
.btn-terminos{
    background-color: #888;
    margin-top: 1vh;
}
</style>
<div id="app">

    <main class="py-4">
        <div class="container">
                
            <div class="col-sm-8 formubtn">
                    @if (session('error'))
                    <div class="alert text-center" role="alert" data-dismiss="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                <form action="{{ url('inicio') }}" method="post">
                    @csrf
                    <input type="hidden" name="ipVisitor" value="{{ $_SERVER['REMOTE_ADDR'] }}">
                    <input type="submit" class="btn botoncito" value="">
                
            </div>
            
                <div class="center-align formuterminos">
                    <input type="radio" name="acept" value="1">
                    Haciendo click en el boton acepta los <a href="#modal1" class="modal-trigger">Terminos y condiciones</a> de Uitalk
                </div>
            
        </form>
        </div>
    </main>
</div>
 <!-- Modal Structure -->
 <div id="myModal" class="modals">

        <!-- Modal content -->
        <div class="modals-content">
                <span class="close"><i class="fas fa-times"></i></span>
                Mauris fermentum massa ut ullamcorper auctor. Duis maximus orci at lobortis dictum. Praesent quam neque, tempus eget leo et, porta dictum augue. Integer eget mauris aliquet, lobortis metus eget, interdum libero. Donec et egestas lectus. Aliquam quis dapibus leo, eu fermentum neque. Nullam porta, nisl ut dignissim posuere, eros diam suscipit elit, a dignissim mi nisi ut odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit.

                Fusce ut mauris ut lectus sodales euismod at in augue. Praesent lorem quam, convallis id lacinia ut, luctus vel urna. Phasellus efficitur augue vitae mi tristique dictum. Quisque auctor elit vel sapien tincidunt egestas. Curabitur volutpat risus ac euismod dignissim. Aliquam maximus odio vitae volutpat volutpat. Etiam semper turpis quis sem ultricies hendrerit. Nam vitae turpis quis ex luctus rutrum et eget sapien. Fusce turpis libero, condimentum sodales ligula ac, faucibus facilisis eros. Nunc tempor consequat ex aliquet tempus. Donec at sagittis ligula. Vivamus pellentesque urna id risus molestie placerat. Donec odio dui, tincidunt hendrerit quam nec, rhoncus semper lectus.
                
                Sed lorem risus, blandit non elit sit amet, rutrum viverra arcu. In sagittis bibendum rhoncus. Integer tristique tincidunt sem a commodo. Vivamus vitae nulla vitae libero elementum sagittis eget non ligula. Cras maximus velit id leo ultricies aliquet. Suspendisse congue, dolor ut lacinia blandit, massa elit laoreet tortor, id imperdiet urna quam in tortor. Nulla ut tincidunt lectus. Sed vestibulum sed nunc molestie lobortis. Mauris non dui odio. Fusce dapibus rutrum lacus ac hendrerit. Suspendisse nisl nulla, aliquam id diam sed, molestie consectetur ligula. Nam eget quam nec metus cursus dapibus ac non massa. Cras ut felis ut dui finibus tristique. In hac habitasse platea dictumst. Nunc vehicula nibh eget tortor mollis, ac placerat turpis malesuada. Vivamus nec tellus nec ex egestas molestie.
                
                Suspendisse et ipsum mattis, maximus dui sed, gravida turpis. Nunc ultrices volutpat massa, sit amet blandit purus venenatis vel. Fusce pellentesque consequat consectetur. Aenean vitae nisi placerat, auctor lectus in, tempus eros. Integer finibus nisi vitae tellus viverra, eget vulputate felis mattis. Duis ut dui cursus, posuere tortor eget, egestas turpis. Proin nibh dolor, convallis non turpis quis, tincidunt dignissim quam. Fusce quam nisi, finibus in felis vel, consequat aliquam sem. Pellentesque mattis, metus a blandit vehicula, mauris metus bibendum turpis, vel pulvinar purus lectus eget erat. Duis volutpat mauris in malesuada vestibulum. In et lacinia lorem. Morbi viverra tincidunt mauris, sed ornare urna aliquet a. Nulla facilisi. Maecenas ullamcorper odio augue, vel aliquam est porta sed. Fusce vel augue mi.
                
                Ut blandit mattis tortor imperdiet malesuada. In mollis mauris ut odio ultricies posuere vitae id quam. Nunc a nibh sollicitudin, scelerisque nulla sed, convallis arcu. Ut at lacus vitae nibh ullamcorper lobortis quis in sapien. Cras quam leo, tempus at metus quis, cursus accumsan mi. Phasellus ligula magna, dapibus ac gravida et, sollicitudin a justo. Ut scelerisque egestas orci, eget gravida lectus interdum at. Pellentesque magna sapien, euismod sed maximus a, tincidunt id sem. Morbi odio augue, aliquet id cursus sit amet, iaculis a nibh. Sed quis ex interdum, cursus orci in, semper urna. Praesent condimentum elit eget magna aliquet porta. Etiam eleifend condimentum malesuada.
                <div class="modal-footer">
                        <button class="btn btn-terminos">Acepto los terminos</button>
                      </div>
        </div>
        
      </div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.modal-trigger').click(function (e) { 
            e.preventDefault();


var modal = $('#myModal');

// Get the <span> element that closes the modal
var span = $(".close")[0];

$(modal).css('display', 'block');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
// When the user clicks on <span> (x), close the modal
$(span).click(function (e) { 
    e.preventDefault();
    $(modal).css('display', 'none');
});


        });

    });

</script>
</body>
</html>
