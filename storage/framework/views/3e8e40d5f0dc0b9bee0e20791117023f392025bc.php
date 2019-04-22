<?php $__env->startSection('css'); ?>
<style>
  * {
    font-family: 'lunchtype21regular';
  }
.modal {
    display: none;
    position: fixed;
    z-index: 9991;
    padding-top: 20px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    max-height: 100%;
}
button.btn:focus {
  background-color: grey !important;
}
/* Modal Content */
.modal-content {
  position: relative; background-color: #fefefe; margin: auto; padding: 0; border: 1px solid #888; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);  -webkit-animation-name: animatetop; -webkit-animation-duration: 0.4s; animation-name: animatetop; animation-duration: 0.4s}
/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}
@keyframes  animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
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
.modal-header {
    padding: 2px 16px;
    background-color: #f7f7f7;
    color: #222222;
}
.modal-body {padding: 2px 16px;}
.modal .modal-header .close { color: #222222;}
#contenidoEvent p {
  font-size: 18px;
}

.scrollbar {
    height: 100vh;
    width: 100vh;
    background: #fff;
    overflow-y: scroll;
    margin-bottom: 25px;
}
.force-overflow {
    min-height: 100vh;
}

.scrollbar-primary::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-primary::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #4285F4; }

.scrollbar-danger::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-danger::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-danger::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #ff3547; }

.scrollbar-warning::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-warning::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-warning::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #FF8800; }

.scrollbar-success::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-success::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-success::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #00C851; }

.scrollbar-info::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-info::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-info::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #33b5e5; }

.scrollbar-default::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-default::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-default::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #2BBBAD; }

.scrollbar-secondary::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-secondary::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-secondary::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #aa66cc; }
  .close3 {
      color: black;
      float: right;
      font-size: 28px;
      font-weight: bold;
  }
  .close3:hover,
  .close3:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
  }
  button:focus {
    background-color: transparent !important;
  }
  .hollow-dots-spinner, .hollow-dots-spinner * {
      box-sizing: border-box;
    }

    .hollow-dots-spinner {
      height: 15px;
      width: calc(30px * 3);
      left: 35%;
      top: 50%;
      position: absolute;
    }

    .hollow-dots-spinner .dot {
      width: 15px;
      height: 15px;
      margin: 0 calc(15px / 2);
      border: calc(15px / 5) solid #8c8c8c;
      border-radius: 50%;
      float: left;
      transform: scale(0);
      animation: hollow-dots-spinner-animation 1000ms ease infinite 0ms;
    }

    .hollow-dots-spinner .dot:nth-child(1) {
      animation-delay: calc(300ms * 1);
    }

    .hollow-dots-spinner .dot:nth-child(2) {
      animation-delay: calc(300ms * 2);
    }

    .hollow-dots-spinner .dot:nth-child(3) {
      animation-delay: calc(300ms * 3);

    }

    @keyframes  hollow-dots-spinner-animation {
      50% {
        transform: scale(1);
        opacity: 1;
      }
      100% {
        opacity: 0;
      }
    }
@media  only screen and (max-width: 1400px) {

.title-spinner{
    top: 40%;
    left: 35%;
    position: relative;
    color: #8c8c8c;
  }
}
@media  only screen and (min-width: 1400px) {

.title-spinner{
    top: 43%;
    left: 35%;
    position: relative;
    color: #8c8c8c;
  }
}
.fondo-spinner{
    position: fixed;
    height: 100vh;
    width: 200vh;
    z-index: 999;
    margin-top: -2vh;
    margin-left: -1vh;
    background-color: rgba(238, 238, 238, 1);
}
.datepicker-date-display{
  background-color: grey;
}
.datepicker-table abbr{
  color: grey;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="fondo-spinner" style="display: none;" id="spinnerloco">
    <div class="title-spinner">
      <h4>Uitalk</h4>
      <br>
      <p>Enviando mails...</p>
    </div>
    <div class="hollow-dots-spinner">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
  </div>
<div id='calendar'></div>

<div id="myModal" class="modal">
<form action="<?php echo e(action('CalendarController@store')); ?>" method="POST" id="formularito">
  <!-- Modal content -->
  <div class="modal-content scrollbar-info" style="width: 55%">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h4>Crear evento</h4>
    </div>
    <div class="modal-body">

        <?php echo e(csrf_field()); ?>

        <div class="input-field col s6">
          <input placeholder="Nombre del evento." id="title" type="text" class="validate" name="title" required>
          <label for="title">Título</label>
        </div>
        <div class="input-field col s6">
          <textarea name="descripcion" rows="8" cols="80" placeholder="Opcional" id="descripcion" class="materialize-textarea"></textarea>
          <label for="descripcion">Descripción</label>
        </div>
        <div class="input-field col s6">
          <input id="start" type="date" class="validate" min="2012" max="2088" name="start" required value="<?php echo e(date('Y-m-d')); ?>">
          <label for="start">Fecha de inicio</label>
        </div>
        <div class="input-field col s6">
          <input id="end" type="date" class="validate" min="2012" max="2088" name="end">
          <label for="end">Fecha de fin</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="" id="timeStart" type="time" class="validate" value="00:00:00" name="startime" min="00:00:00" max="23:59:59" list="">
          <label for="timeStart">Hora de inicio</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="" id="timeEnd" type="time" class="validate" value="" name="endtime">
          <label for="timeEnd">Hora de fin</label>
        </div>
        <div class="input-field col s6">
        <p>  ¿El evento dura todo el día? </p>
        <div class="row">
          <p>
            <label>
              <input class="with-gap" name="allday" type="radio"  value="true" required/>
              <span>Si</span>
            </label>
          </p>
          <p>
            <label>
              <input class="with-gap" name="allday" type="radio"  value="false" required/>
              <span>No</span>
            </label>
          </p>

        </div>

        </div>
        <div class="row">
          <div class="input-field col s6">
            Color del evento:
            <input id="color" type="color" class="validate" name="color" value="#1197C1">
          </div>
          <div class="input-field col s6">
            Color del texto:
            <input id="textcolor" type="color" class="validate" name="textcolor" value="#FFFFFF">
          </div>
        </div>
        <div class="row">
                <label for="">Seleccione a los invitados</label>
                <div class="input-field col s12">
                   
                        <select multiple name="selecMultiple[]">
                        <option value="" disabled selected>Lista de invitados</option>
                                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                              </select>
            </div>
        </div>
        <div class="input-field col s8" id="emailcito">
          
                  <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="email" class="validate" name="email[]" autocomplete="">
                    <label for="email">¿A quién desea notificar del evento?</label>
                  </div>

                </div>
    </div>
    <div class="modal-footer">
      <a class="btn grey" href="#btnadd" id="btnadd">Añadir mail</a>
      <button type="submit" class="btn grey" id="btn-agregar" form="formularito">Agregar Evento</button>
    </div>
  </div>
  </form>
</div>

<div id="myModal3" class="modal">
<form action="<?php echo e(action('CalendarController@store')); ?>" method="POST" id="formularitox">
  <!-- Modal content -->
  <div class="modal-content scrollbar-info" style="width: 55%">
    <div class="modal-header">
      <span class="close3">&times;</span>
      <h4>Crear evento</h4>
    </div>
    <div class="modal-body">

        <?php echo e(csrf_field()); ?>

        <div class="input-field col s6">
          <input placeholder="Nombre del evento." id="title" type="text" class="validate" name="title" required>
          <label for="title">Título</label>
        </div>
        <div class="input-field col s6">
          <textarea name="descripcion" rows="8" cols="80" placeholder="Opcional" id="descripcion" class="materialize-textarea"></textarea>
          <label for="descripcion">Descripción</label>
        </div>
        <div class="input-field col s6">
          <input id="start" type="date" class="validate" min="2012" max="2088" name="start" required value="<?php echo e(date('Y-m-d')); ?>">
          <label for="start">Fecha de inicio</label>
        </div>
        <div class="input-field col s6">
          <input id="end" type="date" class="validate" min="2012" max="2088" name="end">
          <label for="end">Fecha de fin</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="" id="timeStart" type="time" class="validate" value="00:00:00" name="startime" min="00:00:00" max="23:59:59" list="">
          <label for="timeStart">Hora de inicio</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="" id="timeEnd" type="time" class="validate" value="" name="endtime">
          <label for="timeEnd">Hora de fin</label>
        </div>
        <div class="input-field col s6">
        <p>  ¿El evento dura todo el día? </p>
        <div class="row">
          <p>
            <label>
              <input class="with-gap" name="allday" type="radio"  value="true" required/>
              <span>Si</span>
            </label>
          </p>
          <p>
            <label>
              <input class="with-gap" name="allday" type="radio"  value="false" required/>
              <span>No</span>
            </label>
          </p>

        </div>

        </div>
        <div class="row">
          <div class="input-field col s6">
            Color del evento:
            <input id="color" type="color" class="validate" name="color" value="#1197C1">
          </div>
          <div class="input-field col s6">
            Color del texto:
            <input id="textcolor" type="color" class="validate" name="textcolor" value="#FFFFFF">
          </div>
        </div>
        <div class="row">
                <label for="">Seleccione a los invitados</label>
                <div class="input-field col s12">
                   
                        <select multiple name="selecMultiple[]">
                        <option value="" disabled selected>Lista de invitados</option>
                                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                              </select>
            </div>
        </div>
        <div class="input-field col s8" id="emailcito">

          <input id="email" type="email" class="validate" name="email[]">
          <label for="email">¿A quién desea notificar del evento?</label>

        </div>
    </div>
    <div class="modal-footer">
      <a class="btn grey" href="#btnadd" id="btnadd">Añadir mail</a>
      <button type="submit" class="btn grey hoverable" id="btn-agregar" form="formularitox" >Agregar Evento</button>
    </div>
  </div>
  </form>
</div>

<div id="myModal1" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width: 55%">
    <div class="modal-header">
      <span class="close">&times;</span>
      <div id="tituloEvent"></div>
    </div>
    <div class="modal-body" id="contenidoEvent"></div>
    <div class="modal-footer">
        <div class="col m12 xl12">
      <form action="" id="formci" method="DELETE">
        <?php echo e(csrf_field()); ?>

       <div class="row">
         <div class="col m7 xl7">
            <select name="invitados[]" multiple class="selectInvitados">
                <option value="0" disabled selected>Seleccione invitado</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($compas->id); ?>"><?php echo e($compas->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
         </div>
         <div class="col m5 xl5">
            <button type="button" class="btn grey botonInvitacion">Invitar</button>
            <a href="#" class="btn grey" data-id="" id="btnBorrar">Eliminar
            </a>
         </div>
       </div>
      </form>
    </div>

    </div>
  </div>

</div>
<!-- Modal RECORDATORIO -->
<div id="modalRecordatorio" class="modal">

  <!-- Modal RECORDATORIO -->
  <div class="modal-content" style="width: 55%">
    <div class="modal-header">
      
      <span class="close">&times;</span>
      <h5>Recordatorio nuevo</h5>
    </div>
    <div class="modal-body">
    <form action="<?php echo e(route('recordatorio.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="id_user" class="id_user" value="<?php echo e(Auth::user()->id); ?>">

            <input type="text" name="notification_name" class="notification_name" placeholder="Nombre del recordatorio" required>

            <input type="text" name="text" class="text" placeholder="Anotaciones( *Opcional )">

            <input type="date" name="fecha" class="fecha" value="<?php echo e(date('Y-m-d')); ?>" min="2016-01-01" max="2500-01-01" >

            <input type="time" name="hora" class="hora" value="<?php echo e(date('H:i')); ?>">
          
          <div class="row">
          <label for="colorcito">Color del recordatorio</label>
              <input type="color" name="recordcolor" value="#000000" id="colorcito">
          </div>

          <div class="input-field col s12">
                <select multiple name="invitados[]">
                  <option value="0" disabled selected>Lista de usuarios</option>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($us->id); ?>"><?php echo e($us->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <label>Otros usuarios para agregar al recordatorio: </label>
            </div>               

    </div>
    <div class="modal-footer">
     
     
        <button class="btn grey">Crear Recordatorio</button>
      </form>


    </div>
  </div>
</div>
<!-- Modal RECORDATORIO -->

<!-- EMPIEZA MODAL EXPORTAR EVENTOS -->
<div id="modalExpEventos" class="modal">
    <div class="modal-content" style="width: 55%">
        <div class="modal-header">
    
          <span class="close">&times;</span>
          <h5>Exportar eventos</h5>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('exportevent')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
              <div class="col s12 xl4">
                  <label for="deevento">De: </label>
                  <input type="text" id="deevento" name="deevento" class="datepicker deevento" value="<?php echo e(date('d/m/Y')); ?>">
              </div>
              <div class="col s12 xl4">
                  <label for="hastaevento">Hasta: </label>
                  <input type="text" name="hastaevento" id="hastaevento" class="datepicker hastaevento" value="<?php echo e(date('d/m/Y')); ?>">
                </div>
            </div>
              
        </div>
        <div class="modal-footer">
    
          <button class="btn grey btnExport" type="submit">Exportar</button>
          </form>
    
    
        </div>
      </div>
    </div>
    <!-- TERMINA MODAL EXPORTAR EVENTOS -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsscript'); ?>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="<?php echo e(asset('js/from_html.js')); ?>"></script>
<script src="<?php echo e(asset('js/split_text_to_size.js')); ?>"></script>
<script src="<?php echo e(asset('js/standard_fonts_metrics.js')); ?>"></script>
  <script>
       var eventoShow = <?php echo json_encode($eventos); ?>;
    
   
    // var elem = document.querySelector('.datepicker');
    // var instance = M.Datepicker.init(elem, options);
    // // Or with jQuery
    //
    // $(document).ready(function(){
    //     $('.datepicker').datepicker({elem, options});
    // });


$(document).ready(function() {
  let inter_es = {
        cancel: 'Cancelar',
        clear: 'Limpiar',
        done:    'Ok',
        previousMonth:    '‹',
        nextMonth:    '›',
        months:    [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ],
        monthsShort:    [
            'Ene',
            'Feb',
            'Mar',
            'Abr',
            'May',
            'Jun',
            'Jul',
            'Ago',
            'Sep',
            'Oct',
            'Nov',
            'Dic'
        ],

        weekdays:    [
            'Domingo',
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes',
            'Sábado'
        ],

        weekdaysShort:    [
            'Dom',
            'Lun',
            'Mar',
            'Mié',
            'Jue',
            'Vie',
            'Sáb'
        ],

        weekdaysAbbrev:    ['D', 'L', 'M', 'M', 'J', 'V', 'S']

    };

  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    i18n: inter_es,
  });
  $('select').formSelect();
  $('.main-panel').perfectScrollbar();
    // var date = new Date();
    // var d = date.getDate();
    // var m = date.getMonth();
    // var y = date.getFullYear();

    var calendar = $('#calendar').fullCalendar({
      locale: 'es',
      eventLimit: true,
      monthNames: [
         'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
        'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ],
      header: {
        left: 'prev,next today, BotonEvento',
        center: 'title',
        right: 'exportarEventos, BotonRecordatorio, month,agendaWeek,agendaDay'
      },
      customButtons: {
        BotonEvento: {
          text: "Agregar Evento",
          click: function(date, jsEvent, view){
            $('.main-panel').perfectScrollbar('destroy');
            var modal = document.getElementById('myModal3');
            var span = document.getElementsByClassName("close3")[0];

            modal.style.display = "block";

            span.onclick = function() {
              modal.style.display = "none";
              $('.main-panel').perfectScrollbar();
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                  modal.style.display = "none";
                  $('.main-panel').perfectScrollbar();
              }
            }
          },
        },
        BotonRecordatorio: {
          text: "Agregar Recordatorio",
          click: function(date, jsEvent, view){
          
            $('#modalRecordatorio').css('display', 'block');
            
          },
        },
        exportarEventos:{
          text: "Exportar eventos",
          click:() => {
          $('.main-panel').perfectScrollbar('destroy');
          $("#modalExpEventos").css('display', 'block');
        },
        }
      },
      selectable: true,
      selectHelper: true,

        dayClick: function(date, jsEvent, view) {
          $('#start').val(date.format());

          $('.main-panel').perfectScrollbar('destroy');
          var modals = document.getElementById('myModal');
          var spans = document.getElementsByClassName("close")[0];
          modals.style.display = "block";

          spans.onclick = function() {
            modals.style.display = "none";
            $('.main-panel').perfectScrollbar();
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal) {
                modals.style.display = "none";
                $('.main-panel').perfectScrollbar();
            }
          }

          },

      events: eventoShow,
      eventClick: function(calEvent, jsEvent, view) {

          var modal = document.getElementById('myModal1');
          var span = document.getElementsByClassName("close")[0];
          modal.style.display = "block";
          $('.main-panel').perfectScrollbar('destroy');
          $('.close').click(function(){
            $('#myModal1').css("display", "none");
            $('.main-panel').perfectScrollbar();
          });

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                $('.main-panel').perfectScrollbar();
            }
          }
        moment.locale('es'); 
        let fecha = moment(calEvent.start._i).format('L');

       
        
          $('#tituloEvent').html("<h3>"+calEvent.title+"</h3>");
          if(calEvent.descripcion == null){
            $('#contenidoEvent').html("<p>Fecha: "+fecha+"</p><br><p></p>");
          }else{
            $('#contenidoEvent').html("<p>Fecha: "+fecha+"</p><br><p>"+calEvent.descripcion+"</p>");
          }
          $('#formci').append("<input type='hidden' id='eventisloco' class='idevento' name='idevento' value='"+calEvent.id+"'>");
          $('#formci').append("<input type='hidden' class='idusuario' name='idusuario' value='"+calEvent.id_usuario+"'>");
          
          $('#btnBorrar').attr('data-id', calEvent.id);

  },


    });

$("#btnBorrar").click(() => {
  var idEvent = $("#eventisloco").val();
  var url = 'calendar/'+idEvent;
  $.ajax({
    url: url,
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
    type: 'DELETE',
  })
  .done((response) => {
    $('#myModal1').css("display", "none");
    
    window.setTimeout('location.reload()', 1);
    // alert('Evento borrado exitosamente');
  })
  .fail(() => {
    alert("Algo salió mal");
  });

 });

let inviurl = "<?php echo e(route('invitarcal')); ?>"

$(".botonInvitacion").click(() => { 
  // e.preventDefault();


let idEvento = $('.idevento').val();
let idUsuario = $('.idusuario').val();
let invitados = $('.selectInvitados').val();

console.log(idUsuario);

axios.post(inviurl, {
    idevento: idEvento,
    idusuario: idUsuario,
    invitados: invitados
  })
  .then((response) => {
    console.log(response.data);
    var notifications = new Notification("Uitalk", {

      icon: "<?php echo e(asset('images/Recurso1.png')); ?>",
      body: response.data.message
    });
    $("#myModal1").css('display', 'none');
  })
  .catch((error) => {
    console.log(error);
  });  
});


 $('#btnadd').click(function() {
   $('#emailcito').append('<div class="input-field col s6"><i class="material-icons prefix">email</i><input id="email" type="email" class="validate" name="email[]" autocomplete="">');
   $('#btnadd').scrollTop();
 });



  });

</script>
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function (){
    let url = "<?php echo e(url('calendar.index')); ?>";

$("#formularito").submit(function () {
  var notifications = new Notification("Uitalk", {
icon: "<?php echo e(asset('images/Recurso1.png')); ?>",
body: "Has creado un nuevo evento."
});
$('.modal').css('display', 'none');
});

$("#formularitox").submit(function () { 
var notifications = new Notification("Uitalk", {

icon: "<?php echo e(asset('images/Recurso1.png')); ?>",
body: "Has creado un nuevo evento."
});
$('.modal').css('display', 'none');

});

     if (Notification.permission !== "granted") {
    Notification.requestPermission();
  }else{ 
    
   notifications.onclick = function(){
    window.open(url);
  } 
  
 }
  });
</script>
<script>
$(document).ready(function () {
  $('.close').click(function (e) { 
    e.preventDefault();
    $('#modalRecordatorio').css('display', 'none');
  });
 
});

</script>
<script>
$(document).ready(function () {
  window.onkeyup = compruebaTecla;
function compruebaTecla(){
    var e = window.event;
    var tecla = (document.all) ? e.keyCode : e.which;
    if(tecla == 27){
        document.getElementById("myModal").style.display = "none";
        document.getElementById("myModal1").style.display = "none";
        document.getElementById("modalRecordatorio").style.display = "none";
        $('.main-panel').perfectScrollbar();
    }
}
});

</script>
<script>
$(".close").click((e) => { 
  e.preventDefault();
  $(".modal").css('display', 'none');
});

// $(document).ready(() => {
//   $(".btnExport").click((e) =>{ 
//     e.preventDefault();
// let deevento = $(".deevento").val();
// let hastaevento = $(".hastaevento").val();
// let url = "<?php echo e(route('exportevent')); ?>";

// axios.get(url, {
//   deevento: deevento,
//   hastaevento: hastaevento
//     })
//   .then((response)=>{
//     moment.locale('es');
//     let fecha = moment().format('hmmss-DD-MMMM-YYYY');
//     console.log(response);
//     var blob=new Blob([response.data]);
//     var link=document.createElement('a');
//     link.href=window.URL.createObjectURL(blob);
//     link.download="Evento"+fecha+".pdf";
//     link.click();
//   })
//   .catch((error)=>{
//     console.error(error);
//   });
//   });
// });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('calendario.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>