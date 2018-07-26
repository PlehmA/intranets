@extends('layouts.app')
@section('content')
<div id='calendar'></div>

<div id="myModal" class="modal">
<form action="{{ action('CalendarController@store') }}" method="POST" id="formularito">
  <!-- Modal content -->
  <div class="modal-content scrollbar-info">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h4>Crear evento</h4>
    </div>
    <div class="modal-body">

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
          <input id="start" type="date" class="validate" min="2012" max="2088" name="start" required value="{{ date('Y-m-d') }}">
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
<form action="{{ action('CalendarController@store') }}" method="POST" id="formularito">
  <!-- Modal content -->
  <div class="modal-content scrollbar-info">
    <div class="modal-header">
      <span class="close3">&times;</span>
      <h4>Crear evento</h4>
    </div>
    <div class="modal-body">

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
          <input id="start" type="date" class="validate" min="2012" max="2088" name="start" required value="{{ date('Y-m-d') }}">
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
        <div class="input-field col s8" id="emailcito">

          <input id="email" type="email" class="validate" name="email[]">
          <label for="email">¿A quién desea notificar del evento?</label>

        </div>
    </div>
    <div class="modal-footer">
      <a class="btn grey" href="#btnadd" id="btnadd">Añadir mail</a>
      <button type="submit" class="btn grey" id="btn-agregar" form="formularito" onclick="notificar()">Agregar Evento</button>
    </div>
  </div>
  </form>
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
@section('javascript')
<script>
        $(".main-panel").perfectScrollbar('destroy');
</script>
<script>
    
var eventoShow = {!! json_encode($eventos) !!};

$(document).ready(function() {

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
        right: ''
      },
      customButtons: {
        BotonEvento: {
          text: "Agregar Evento",
          click: function(date, jsEvent, view){

            var modal = document.getElementById('myModal3');
            var span = document.getElementsByClassName("close3")[0];

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

 $('#btnadd').click(function() {
   $('#emailcito').append('<div class="input-field col s6"><i class="material-icons prefix">email</i><input id="email" type="email" class="validate" name="email[]" autocomplete="">');
   $('#btnadd').scrollTop();
 });



  });

</script>
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function (){
    let url = "{{ url('calendar.index') }}";

$("#formularito").submit(function () { 

  var notifications = new Notification("Han creado un nuevo evento", {

icon: "{{ asset('images/Recurso1.png') }}",
body: "Este es el contenido del body"
});
  
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
@endsection
