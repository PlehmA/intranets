@extends('calendario.app')
@section('css')
<style>
  * {
    font-family: 'lunchtype21regular';
  }
.modal {
    display: none;
    position: fixed;
    z-index: 6;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    max-height: 100%;
}
/* Modal Content */
.modal-content { position: relative; background-color: #fefefe; margin: auto; padding: 0; border: 1px solid #888; width: 40%; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);  -webkit-animation-name: animatetop; -webkit-animation-duration: 0.4s; animation-name: animatetop; animation-duration: 0.4s}
/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}
@keyframes animatetop {
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
</style>
@endsection
@section('content')
<div id='calendar'></div>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h4>Crear evento</h4>
    </div>
    <div class="modal-body">
      <form action="" method="POST" id="formularito">
        {{ csrf_field() }}
        <div class="input-field col s6">
          <input placeholder="Nombre del evento." id="title" type="text" class="validate" name="title" required>
          <label for="title">Título</label>
        </div>
        <div class="input-field col s6">
          <textarea name="descripcion" rows="8" cols="80" placeholder="Opcional" id="descripcion" class="materialize-textarea"></textarea>
          <label for="descripcion">Descripción</label>
        </div>
        <div class="input-field col s6">
          <input id="start" type="date" class="validate" min="2012" max="2088" name="start">
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
      </form>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn grey" id="btn-agregar" form="formularito">Agregar Evento</button>
    </div>
  </div>

</div>


<div id="myModal1" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <div id="tituloEvent"></div>
    </div>
    <div class="modal-body" id="contenidoEvent"></div>
    <div class="modal-footer">
      <form action="" id="formci" method="DELETE">
        {{ csrf_field() }}
        <a href="#" class="btn grey" data-id="" id="btnBorrar">Borrar evento</a>
      </form>


    </div>
  </div>

</div>
@endsection

@section('jsscript')

  <script>
       var eventoShow = {!! json_encode($eventos) !!};

$(document).ready(function() {
    //
    // var date = new Date();
    // var d = date.getDate();
    // var m = date.getMonth();
    // var y = date.getFullYear();

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
          click: function(date, jsEvent, view){

            var modal = document.getElementById('myModal');
            var span = document.getElementsByClassName("close")[0];

            modal.style.display = "block";

            span.onclick = function() {
              modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                  modal.style.display = "none";
              }
            }
          },
        }
      },
      selectable: true,
      selectHelper: true,

        dayClick: function(date, jsEvent, view) {
          $('#start').val(date.format());

          var modal = document.getElementById('myModal');
          var span = document.getElementsByClassName("close")[0];
          modal.style.display = "block";

          span.onclick = function() {
            modal.style.display = "none";
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
          }

          },

      editable: true,
      events: eventoShow,
      eventClick: function(calEvent, jsEvent, view) {


          var modal = document.getElementById('myModal1');
          var span = document.getElementsByClassName("close")[0];
          modal.style.display = "block";

          $('.close').click(function(){
            $('#myModal1').css("display", "none");
          });

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
          }

          $('#tituloEvent').html("<h4>Evento: "+calEvent.title+"</h4>");
          $('#contenidoEvent').html("<p>Fecha de evento: "+calEvent.start._i+"</p><br><p>"+calEvent.descripcion+"</p>");

          $('#btnBorrar').attr('data-id', calEvent.id);


  },



    });

    var form = $('#formularito').serialize();
    var dir = '/calendar/';

$('#formularito').submit(function(e) {
e.preventDefault();
var horaStart = $('#timeStart').val();
var horaEnd =$('#timeEnd').val();

var NuevoEvento = {
    title:  $('#title').val(),
    descripcion:  $('#descripcion').val(),
    start:  $('#start').val()+" "+horaStart,
    end:  $('#end').val()+" "+horaEnd,
    allday:  $('#allday').val(),
    color:  $('#color').val(),
    textcolor:  $('#textcolor').val(),
  }

$('#calendar').fullCalendar('renderEvent', NuevoEvento);
$('#myModal').css("display", "none");
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

console.log(form);
 $.post(dir, form, function(result) {
   alert(result.success);
   /*optional stuff to do after success */
 }).fail(function(){
   alert('Algo salió mal');
 });
});





$('#btnBorrar').click(function() {
  var idEvent = $(this).attr('data-id');
  var url = 'calendar/'+idEvent;
  $.ajax({
    url: url,
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
    type: 'DELETE',
  })
  .done(function(response) {
    $('#myModal1').css("display", "none");
    window.setTimeout('location.reload()', 1);
    // alert('Evento borrado exitosamente');
  })
  .fail(function() {
    alert("Algo salió mal");
  });

 });
  });

</script>

@endsection
