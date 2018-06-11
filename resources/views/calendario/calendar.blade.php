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
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 40%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

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

.modal .modal-header .close {
  color: #222222;
}
.input-field.col label {
  left: 0;
}
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
      <form action="{{ route('calendar.store') }}" method="POST" id="formularito">
        {{ csrf_field() }}
        <div class="input-field col s6">
          <input placeholder="Nombre del evento." id="title" type="text" class="validate" required>
          <label for="title">Título</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Opcional" id="descripcion" type="text" class="validate">
          <label for="descripcion">Descripción</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Fecha de evento" id="start" type="date" class="validate" min="2012" max="2088">
          <label for="start">Fecha de inicio</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="" id="end" type="date" class="validate" min="2012" max="2088">
          <label for="end">Fecha de fin</label>
        </div>
        <div class="input-field col s6">
          <input placeholder="" id="time" type="time" class="validate" value="10:50:30">
          <label for="time">Hora del evento</label>
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
            <input id="icon_prefix" type="color" class="validate" name="color">
          </div>
          <div class="input-field col s6">
            Color del texto:
            <input id="icon_prefix" type="color" class="validate" name="text-color" value="#ffffff">
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn grey" form="formularito">Agregar Evento</button>
      <button type="button" class="btn grey darken-3">Borrar</button>
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
      events: eventoShow,



    });

  });

</script>

@endsection
