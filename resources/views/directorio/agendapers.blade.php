@extends('directorio.app')
@section('content')
  @if (Auth::check())
    <ol class="breadcrumb">
      <li><a href="{{ route('directorio.index') }}">Agenda interna</a></li>
      <li><a href="{{ route('contact.index') }}">Agenda externa</a></li>
      @foreach ($agendas as $agen)
        <li><a href="{{ action('AgendaController@show', $agen->id) }}">{{ $agen->nombre_agenda }}</a></li>
      @endforeach
      <li><a href="#modal1" class="modal-trigger agendapers" title="Crea tu agenda personal!">Crear agenda <i class="fas fa-plus"></i> </a></li>
    </ol>
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Crear agenda</h4>
          <hr>
        <div class="row">
     <form class="col s12" id="modalForm" method="GET" action="{{ route('agenda.create') }}">
       {{ csrf_field() }}
       <div class="row">
         <div class="input-field col s12">
           <input id="nombre_agenda" type="text" name="nombre_agenda" class="validate" required>
           <label for="nombre_agenda">Nombre de agenda</label>
         </div>
       </div>
       <div class="input-field col s7">
         <button class="btn waves-effect waves-light right" type="submit" name="action" form="modalForm">Crear
           <i class="material-icons right">send</i>
         </button>
       </div>
     </form>
   </div>

      </div>
    </div>

    <div id="alert" class="container alert alert-success text-center" role="alert" data-dismiss="alert" style="display: none; font-size: 16px;"></div>
      @if (session('success'))
          <div class="container alert alert-success text-center" role="alert" data-dismiss="alert">
              {{ session('success') }}
          </div>
      @endif

      @if (session('error'))
          <div class="container alert alert-danger text-center" role="alert" data-dismiss="alert">
              {{ session('error') }}
          </div>
      @endif

      <div class="container-fluid">
        @foreach ($agenda as $agend)
          <h3 class="center">{{ $agend->nombre_agenda }}</h3>
        @endforeach

{!! Form::open(['method' => 'DELETE','route' => ['agenda.destroy', $agend->id]]) !!}
<a href="#" class="btn btn-rojo left btn-agendabr">Borrar agenda <i class="material-icons">delete_forever</i></a>
{!! Form::close() !!}
<div class="row col s12">
  <div class="col s4 left">
    {{ $datos->render() }}
  </div>
  <div class="col s8 right">
    <a href="{{ route('datoscol.show', $agend->id) }}" class="btn btn-gris right">Importar contactos</a>
    <a href="#modal2" class="btn btn-gris modal-trigger right">Agregar contacto</a>
  </div>
</div>

<div class="row">
  {{ Form::open(['route' => 'directorio.index', 'method' => 'GET', 'class' => 'col s12']) }}
   @csrf
    <div class="row">
      <div class="input-field offset-s2 col s2">
        {{ Form::text('name', null, ['class' => 'validate', 'id' => 'nom_ape']) }}
        <label for="nom_ape">Nombre y apellido</label>
      </div>
      <div class="input-field col s2">
        {{ Form::text('email', null, ['class' => 'validate', 'id' => 'email']) }}
        <label for="email">Correo</label>
      </div>
      <div class="input-field col s2">
        {{ Form::text('area', null, ['class' => 'validate', 'id' => 'area']) }}
        <label for="area">Área</label>
      </div>
      <div class="input-field col s3">
        <button class="btn waves-effect waves-light btn-small" type="submit" name="action" style="background-color: #8F8E8F;">Buscar
          <i class="material-icons right">search</i>
        </button >
      </div>
    </div>
    {{ Form::close() }}
</div>


        <table class="table responsive-table table-bordered">
          <thead>
            <tr>
              <th><b>Nombre y apellido</b></th>
              <th><b>Correo</b></th>
              <th><b>Dirección</b></th>
              <th><b>Partido</b></th>
              <th><b>Localidad</b></th>
              <th><b>Provincia</b></th>
              <th><b>Tel. Línea</b></th>
              <th><b>Tel. Celular</b></th>
              <th><b>Interno</b></th>
              <th>&nbsp;</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
@foreach ($datos as $columna)
  <tr>
    <td>{{ $columna->nomyap }}</td>
    <td>{{ $columna->correo }}</td>
    <td>{{ $columna->direccion }}</td>
    <td>{{ $columna->provincia }}</td>
    <td>{{ $columna->partido }}</td>
    <td>{{ $columna->localidad }}</td>
    <td>{{ $columna->tellinea }}</td>
    <td>{{ $columna->telcel }}</td>
    <td>{{ $columna->interno }}</td>
    <td><center><a href="{{ route('datoscol.edit', $columna->id) }}" class="btn btn-azul btn-small center editar" title="Editar"><i class="material-icons">edit</i></a></center></td>
    <td><center>
      {!! Form::open(['method' => 'DELETE','route' => ['datoscol.destroy', $columna->id]]) !!}
      <a href="#" class="btn btn-rojo btn-borrar center borrar" title="Borrar"><i class="material-icons">delete_forever</i></a>
      {!! Form::close() !!}
    </center></td>
  </tr>
@endforeach

          </tbody>
        </table>
      </div>
    {{ $datos->render() }}
      <div id="modal2" class="modal">
        <div class="modal-content">
          <h4>Agregar contacto</h4>
            <hr>
          <div class="row">
            <form class="" action="{{ route('datoscol.store') }}" method="POST" id="modalForm1">
              {{ csrf_field() }}
              <div class="row">
                <div class="input-field col s7 offset-s2">
                  <input id="nomyap" type="text" class="validate" required name="nomyap">
                  <label for="nomyap">Nombre y Apellido</label>
                </div>
              <div class="input-field col s7 offset-s2">
                <input id="correo" type="text" class="validate" required name="correo">
                <label for="correo">Correo</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="direccion" type="text" class="validate" name="direccion">
                <label for="direccion">Dirección</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="partido" type="text" class="validate" name="partido">
                <label for="partido">Partido</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="localidad" type="text" class="validate" name="localidad">
                <label for="localidad">Localidad</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="provincia" type="text" class="validate" name="provincia">
                <label for="provincia">Provincia</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="tellinea" type="text" class="validate" name="tellinea">
                <label for="tellinea">Tel. Línea</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="telcel" type="text" class="validate" name="telcel">
                <label for="telcel">Tel. Celular</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="interno" type="number" class="validate" name="interno">
                <label for="interno">Interno</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="nombre_agenda" type="hidden" class="validate" required name="nombre_agenda" value="{{ $agend->nombre_agenda }}">

              </div>
              <div class="input-field col s7 offset-s2">
                <input id="id_agenda" type="hidden" class="validate" required name="id_agenda" value="{{ $agend->id }}">

              </div>
         <div class="input-field col s7">
           <button class="btn btn-gris waves-effect waves-light right" type="submit" name="action" form="modalForm1">Agregar
             <i class="material-icons right">send</i>
           </button>
         </div>
       </form>
     </div>
   </div>
  </div>
</div>

</div>
    @endif
    @endsection
    @section('scripts')
    <script>
    $(document).ready(function(){
      $('.modal').modal();

      $('#alert').hide();
      $('.btn-borrar').click(function(e){
        e.preventDefault();
        if ( ! confirm('¿Está seguro/a de eliminar el contacto?')) {
          return false;
        }

        let row  = $(this).parents('tr');
        let form = $(this).parents('form');
        let url  = form.attr('action');

        $('#alert').show();

        $.post(url, form.serialize(), function(result) {
          row.fadeOut();
          $('#alert').html(result.success);
          /*optional stuff to do after success */
        }).fail(function(){
          $('#alert').html('Algo salió mal');
        });
      });

var url = '{{ route('directorio.store') }}';
      $('#formcheck').click(function(){
        var checked = []
          $("input[name='check[]']:checked").each(function ()
          {
              checked.push(parseInt($(this).val()));
          });
          $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
           $.ajax({
              url: url,
             type: 'POST',
             data: checked
           })
           .fail(function() {
             console.log("error");
           });
      });


    $('.btn-agendabr').click(function(){

      if ( ! confirm('¿Está seguro/a de eliminar la agenda?')) {
        return false;
      }

      let form = $(this).parents('form');
      let url  = form.attr('action');

      $.post(url, form.serialize(), function(result) {
        window.location='{{route('directorio.index')}}';
        alert(result.success);
        /*optional stuff to do after success */
      }).fail(function(){
        $('#alert').html('Algo salió mal');
      });
    });
    });
    </script>
    @endsection
