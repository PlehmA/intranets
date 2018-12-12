@extends('layouts.app')
@section('css')
<style>
.content{
  margin-top: 8vh;
}
textarea{
  width: 100%;
    height: 10rem;
    background-color: whitesmoke;
}
::placeholder {
    color: gray;
    opacity: 1; /* Firefox */
}
.alert{
  background-color: #bdbdbd;
  opacity: 0.5;
  display: none;
  color: black;
  font-weight: 700;
}
select {
    /* background-color: rgba(255, 255, 255, 0.9); */
    width: initial;
    padding: initial;
    border: initial;
    border-radius: initial;
    height: initial;
    display: block;
}
p {
    margin: -3px 10px 10px;
}

</style>
@endsection
@section('header')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="row">
    <h4 class="center-align">Registro de tickets</h4>
</div>
<table data-order='[[ 0, "desc" ]]' id="tablilla">
    <thead>
        <tr>
            <th>ID</th>
            <th>Asunto</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody id="filas">
            {{-- <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> --}}
    </tbody>
      </table>

<hr>
<div class="row">

            <div class="col s1">
                <span style="margin-right: 10px;" class="badge light-blue left">Abierto</span> 
            </div>
            <div class="col s5">
                    <p>1. Solicitud ingresada, a la espera de ser asignada a un agente.</p>
                   
            </div>

            <div class="col s1">
                    <span style="margin-right: 10px;" class="badge light-green darken-1 left">Resuelto</span>
                </div>
                    <div class="col s5">
                            <p>3. El agente ha realizado la tarea de soporte solicitada.</p>
                     </div>
       
</div>


      

<div class="row">
        <div class="col s1">
                <span style="margin-right: 10px;" class="badge deep-orange lighten-1 left">Pendiente</span>
            </div>
            <div class="col s5">
                    <p>2. La gestión ya ha sido asignada a un agente específico.</p>
             </div>

        <div class="col s1">
            <span style="margin-right: 10px;" class="badge grey lighten-1 left">Cerrado</span>
        </div>
            <div class="col s5">
                    <p>4. Ya se evaluó que la resolución sea efectiva y definitiva.</p>
             </div>
</div>
           


           
           


      
@endsection
@section('javascript')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/es.js"></script>
<script>
    moment.locale('es');
$(document).ready(function () {



var user_email = "{{ Auth::user()->email }}";
var yourdomain = 'odontopraxis';
var api_key = 'hMkNHBcvlLb0c1QwMPBj';

        $.ajax({
            url: "https://"+yourdomain+".freshdesk.com/api/v2/contacts?email="+user_email,
            type: 'GET',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            headers: {
              "Authorization": "Basic " + btoa(api_key + ":x")
            },
            success: function(data, textStatus, jqXHR) {
                // console.log('Este es tú número de ID: '+data[0].id)
                const IDUSER = data[0].id

        $.ajax({
            url: "https://"+yourdomain+".freshdesk.com/api/v2/tickets",
            type: 'GET',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            headers: {
              "Authorization": "Basic " + btoa(api_key + ":x")
            },
            success: function(data, textStatus, jqXHR) {
               for (let i = 0; i < data.length; i++) {
                   let information = data[i].requester_id;
                  
                if (IDUSER == information) {
                //    console.log(data[i]);
                if (data[i].status == 2) {

                    let estado = 'Abierto';

                    let fila = '<tr><td><b>#'+data[i].id+'</b></td><td>'+data[i].subject+'</td><td>'+data[i].description+'</td><td>'+moment(data[i].created_at).format('L')+'</td><td><span class="badge light-blue">'+estado+'</span></td></tr>';

                    $('#filas').append(fila);

                }else if (data[i].status == 3){

                    let estado = 'Pendiente';

                    let fila = '<tr><td><b>#'+data[i].id+'</b></td><td>'+data[i].subject+'</td><td>'+data[i].description+'</td><td>'+moment(data[i].created_at).format('L')+'</td><td><span class="badge deep-orange lighten-1">'+estado+'</span></td></tr>';

                    $('#filas').append(fila);

                }else if (data[i].status == 4){

                    let estado = 'Resuelto';

                    let fila = '<tr><td><b>#'+data[i].id+'</b></td><td>'+data[i].subject+'</td><td>'+data[i].description+'</td><td>'+moment(data[i].created_at).format('L')+'</td><td><span class="badge light-green darken-1">'+estado+'</span></td></tr>';

                    $('#filas').append(fila);

                }else if (data[i].status == 5){

                    let estado = 'Cerrado';

                    let fila = '<tr><td><b>#'+data[i].id+'</b></td><td>'+data[i].subject+'</td><td>'+data[i].description+'</td><td>'+moment(data[i].created_at).format('L')+'</td><td><span class="badge grey lighten-1">'+estado+'</span></td></tr>';

                    $('#filas').append(fila);

                    }

                }

               }

               $('#tablilla').DataTable({
                language: {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    }
               });
               
              $('#code').text(jqXHR.status);
              $('#response').html(JSON.stringify(data, null, "<br/>"));
            },
            error: function(jqXHR, tranStatus) {
              $('#result').text('Error');
              $('#code').text(jqXHR.status);
              x_request_id = jqXHR.getResponseHeader('X-Request-Id');
              response_text = jqXHR.responseText;
              $('#response').html(" Error Message : <b style='color: red'>"+response_text+"</b>.<br/> Your X-Request-Id is : <b>" + x_request_id + "</b>. Please contact support@freshdesk.com with this id for more information.");
            }
          });


           //     console.log(data[0].id);
           //   $('#code').text(jqXHR.status);
            //  $('#response').html(JSON.stringify(data, null, "<br/>"));
            },
            error: function(jqXHR, tranStatus) {
              $('#result').text('Error');
              $('#code').text(jqXHR.status);
              x_request_id = jqXHR.getResponseHeader('X-Request-Id');
              response_text = jqXHR.responseText;
              $('#response').html(" Error Message : <b style='color: red'>"+response_text+"</b>.<br/> Your X-Request-Id is : <b>" + x_request_id + "</b>. Please contact support@freshdesk.com with this id for more information.");
            }
          });


       
});
</script>
@endsection