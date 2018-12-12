<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Uitalk</title>

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
        background: url({{ url('/img/logueoproporcionado.png') }}) no-repeat;
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
      white-space: initial;
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
    color: whitesmoke;
    margin-top: 1vh;
}
.btn-desc{
    background-color: #888;
    color: whitesmoke;
    margin-top: 1vh;
    text-decoration: none;
}
.btn-desc:hover{
text-decoration: none;
color: white;
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
                <h2 style="text-align: center;"><strong>T&Eacute;RMINOS Y CONDICIONES</strong></h2>
                <p>&nbsp;</p>
                <p>A trav&eacute;s de este documento, Odontopraxis Americana S.A. notifica a todo el personal las pol&iacute;ticas de regulaci&oacute;n para el buen uso de los equipos inform&aacute;ticos, las restricciones de la navegabilidad y el manejo del sistema de intranet Uitalk&copy;. Los mismos pueden variar, de manera particular o general, quedando sujetos a consideraci&oacute;n del Departamento de Sistemas y las autoridades de la empresa.</p>
                <p>&nbsp;</p>
                <ol>
                <li><strong>USOS GENERALES DE LOS EQUIPOS INFORM&Aacute;TICOS </strong></li>
                </ol>
                <p>El personal queda debidamente notificado que los elementos entregados por la empresa, ya sean computadoras, dispositivos celulares, tabletas y cualquier otro elemento inform&aacute;tico ser&aacute; considerado y constituye una herramienta de trabajo. En estos t&eacute;rminos, deber&aacute;n interpretarse las siguientes consideraciones:</p>
                <p>-Las terminales de trabajo est&aacute;n destinadas &uacute;nicamente al cumplimiento de tareas laborales, por lo que los ficheros de almacenamiento del disco local son propiedad irrestricta de la compa&ntilde;&iacute;a.</p>
                <p>-Est&aacute; prohibido copiar y enviar o compartir informaci&oacute;n confidencial<sup>[</sup><sup>1]</sup> de la empresa relacionada a sus negocios, clientes y asuntos corporativos de cualquier &iacute;ndole. Este tipo de filtraciones ser&aacute;n sancionadas por la empresa, pudiendo llegar a ser causal de despido, seg&uacute;n sea el caso.</p>
                <p>-Todo software desarrollado por la empresa est&aacute; protegido por copyright y por otras leyes de propiedad intelectual, por lo que est&aacute; prohibido la divulgaci&oacute;n de los mismos en su dise&ntilde;o y sus funciones t&eacute;cnicas.</p>
                <p>-Los agentes del Departamento de Sistemas tienen libertad de acci&oacute;n en las tareas de mantenimiento sobre las terminales de trabajo. Debiendo previamente informar a los jefes de &aacute;rea sobre las acciones que sean consideradas cr&iacute;ticas, entendiendo por estas las siguientes: reinstalaci&oacute;n de programas que presenten fallas, cambios en las cuentas de correo electr&oacute;nico, fechas programada de actualizaci&oacute;n del software, formateo del sistema operativo y toda tarea que pueda generar la p&eacute;rdida de archivos y/o informaci&oacute;n valiosa para el personal. La enumeraci&oacute;n es meramente ejemplificativa.</p>
                <h6 style="font-size: 10px;"><sup>[</sup><sup>1] </sup>Todo tipo de informaci&oacute;n relacionada con la actividad comercial o t&eacute;cnica de la empresa que le ata&ntilde;e en su labor, incluidos, y sin limitaci&oacute;n alguna, los conocimientos t&eacute;cnicos, datos, procesos, dise&ntilde;os, fotograf&iacute;as, planos, especificaciones, programas de software, muestras y aspectos vinculantes a la seguridad. Solo se excluye todo aquello que entra en el dominio p&uacute;blico y est&eacute; por fuera del &aacute;mbito de Odontopraxis Americana S.A.</h6>
                <ol start="2">
                        <p>&nbsp;</p>
                <li><strong>RESTRICCIONES DE NAVEGABILIDAD</strong></li>
                </ol>
                <p>El personal queda debidamente notificado que, a trav&eacute;s de las terminales de trabajo, queda prohibido la navegaci&oacute;n y/o utilizaci&oacute;n con fines diferentes a las tareas correspondientes a su cargo. A continuaci&oacute;n, se enumeran a modo ejemplificativo las acciones antirreglamentarias:</p>
                <p>-Ingresar a p&aacute;ginas de descarga y realizar bajadas de contenido que no tengan relaci&oacute;n directa con la labor de la empresa, cualquiera sea su peso y extensi&oacute;n digital.</p>
                <p>-Visitar salas de chats, portales de juegos o streaming, agentes de turismo, compras online, venta de acciones y/o aquellas que est&eacute;n ligadas con el odio y la discriminaci&oacute;n, la pornograf&iacute;a, entre otros.</p>
                <p>-Acceder a las siguientes redes sociales Facebook, Twitter, Tinder, Happn, Badoo, Instagram, Youtube, Mercado Libre y Whatsapp Web.</p>
                <p><strong>NOTA: </strong>Estas restricciones podr&iacute;an ampliarse, en funci&oacute;n de priorizar la productividad del personal, debiendo ser primeramente informado de manera oficial. Se solicita respetar las mismas y no violarlas, para evitar posibles sanciones.</p>
                <ol start="3">
                <li><strong>USOS GENERALES DE UITALK</strong><strong>&copy;</strong></li>
                </ol>
                <p>Cada terminal de trabajo ofrece la plataforma <em>online</em> Uitalk&copy;, una herramienta de intranet que se ejecuta a trav&eacute;s de los navegadores preinstalados por el Departamento de Sistemas (Google Chrome, Mozilla Firefox o Microsoft Explorer). Su uso es de condici&oacute;n obligatoria para todo el personal, sin excepci&oacute;n.</p>
                <p>El usuario y el acceso a la/las cuenta/s de correo electr&oacute;nico a trav&eacute;s de Uitalk&copy;, son provistos y vinculados por los representantes del Departamento de Sistemas, el cual se responsabiliza por brindar soporte para el funcionamiento de la plataforma.</p>
                <p>Para garantizar el buen uso y manejo de Uitalk&copy;, se pone en conocimiento de los miembros de la empresa las siguientes consideraciones.</p>
                <p>&nbsp;</p>
                <p><strong>3.A. COMUNICACIONES FORMALES E INFORMALES</strong></p>
                <p>Uitalk&copy; cuenta con un chat para comunicarse con otros miembros del personal. Acerca de esta aplicaci&oacute;n, se notifica que:</p>
                <p>-<strong>No tiene car&aacute;cter formal</strong>. Si bien los usuarios pueden realizar intercambios de cualquier tipo de relevancia a trav&eacute;s del chat, los mismos tendr&aacute;n car&aacute;cter informal para la empresa y sus miembros. Por lo que se solicita que toda comunicaci&oacute;n de car&aacute;cter oficial, se efect&uacute;e v&iacute;a mail.</p>
                <p>-<strong>Es de car&aacute;cter privado</strong>. Se garantiza la confidencialidad de las conversaciones y solamente se realizar&aacute; una excepci&oacute;n si se considera que alg&uacute;n tipo de intercambio pone en riesgo la seguridad de Odontopraxis Americana S.A.</p>
                <p>-<strong>Se borrar&aacute; el historial cada 15 d&iacute;as corridos</strong>, por lo que se sugiere el resguardo de cualquier informaci&oacute;n que sea considerada &uacute;til y/o sensible en un documento aparte.</p>
                <p>-<strong>Est&aacute; prohibida la divulgaci&oacute;n</strong> de las conversaciones entre los usuarios, sin el expreso consentimiento de ambas partes. En caso de no respetar esta norma de confidencialidad, la empresa podr&aacute; sancionar a quien cometa dicha violaci&oacute;n.</p>
                <p>&nbsp;</p>
                <p><strong>3.B. ALMACENAMIENTO Y GUARDADO</strong></p>
                <p>Uitalk&copy; trabaja con los par&aacute;metros de almacenamiento, autoguardado y backup de archivos en la nube de Microsoft OneDrive. Sobre este asunto, se pone al personal en conocimiento de lo siguiente:</p>
                <p>-Cada usuario cuenta con un fichero propio para crear su directorio personalizado de carpetas y archivos. Al mismo tambi&eacute;n podr&aacute;n ingresar el jefe del &aacute;rea correspondiente y los agentes del Departamento de Sistemas.</p>
                <p>-Est&aacute; prohibido almacenar archivos que no tengan relaci&oacute;n directa con las tareas de trabajo, tanto en el disco local como en la nube, cualquiera sea su peso y extensi&oacute;n digital. Si se encuentran este tipo de archivos, tanto el jefe de &aacute;rea como el Departamento de Sistemas tendr&aacute;n autorizaci&oacute;n para eliminarlos.</p>
                <p>-Todos los usuarios cuentan con un plazo de 60 d&iacute;as, a partir de la fecha, para migrar los archivos que <u>no</u> tengan interacci&oacute;n con los programas instalados y ejecutables desde el sistema operativo de la computadora.</p>
                <p>-Para optimizar el correcto almacenamiento de los archivos, bajo las consideraciones antes descriptas, el Departamento de Sistemas tiene autorizaci&oacute;n para eliminar archivos que no tengan relaci&oacute;n con las tareas laborales cada 30 d&iacute;as, una vez finalizado el plazo de migraci&oacute;n. Esta tarea de mantenimiento ser&aacute; llevada adelante de manera consulta con los jefes de &aacute;rea, que deber&aacute;n prestar colaboraci&oacute;n para determinar si hay archivos que requieran ser conservados.</p>
                <p><strong>ALCANCE</strong></p>
                <p>Todas las normativas detalladas en los t&eacute;rminos y condiciones de las pol&iacute;ticas de regulaci&oacute;n para el buen uso de los equipos inform&aacute;ticos, las restricciones de la navegabilidad y el manejo del sistema de intranet Uitalk&copy;, se aplican a todos los empleados y todo el equipamiento inform&aacute;tico, durante la jornada laboral.</p>
                <p><strong>ACCIONES DISCIPLINARIAS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></p>
                <p>Cualquier miembro de la empresa que no cumpla estas pautas, puede estar sujeto a posibles sanciones.</p>
                <p>&nbsp;</p>
                
                
                 
                <div class="modal-footer">
                <a href="{{ url('img/terminosycondiciones.pdf') }}" class="btn btn-desc" download="Términos y condiciones Uitalk">Descargar y entregar en RRHH</a>
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
$('.btn-terminos').click(function (e) { 
    e.preventDefault();
    $('#myModal').css('display', 'none');
});
    });

</script>
<script>
setInterval(() => {
window.location.reload(true);
}, 50000)
</script>
</body>
</html>
