@extends('layout.app')
@section('content')

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
