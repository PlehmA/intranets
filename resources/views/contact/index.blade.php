@extends('contact.app')
@section('content')
  @if (Auth::check())
    <ol class="breadcrumb">
      <li><a href="{{ route('directorio.index') }}">Agenda interna</a></li>
      <li><a href="{{ route('contact.index') }}">Agenda externa</a></li>
      @foreach ($agenda as $agend)
        <li><a href="{{ action('AgendaController@show', $agend->id) }}">{{ $agend->nombre_agenda }}</a></li>
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
         <button class="btn grey right" type="submit" name="action" form="modalForm">Crear
           
         </button>
       </div>
     </form>
   </div>

      </div>
    </div>

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
      <h3 class="center">Agenda externa</h3>
      <div class="row">
        {{ Form::open(['route' => 'contact.index', 'method' => 'GET', 'class' => 'col s12']) }}
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
              {{ Form::text('localidad', null, ['class' => 'validate', 'id' => 'localidad']) }}
              <label for="localidad">Localidad</label>
            </div>
            <div class="input-field col s2">
              {{ Form::text('direccion', null, ['class' => 'validate', 'id' => 'direccion']) }}
              <label for="direccion">Dirección</label>
            </div>
            <div class="input-field col s1">
              <button class="btn btn-small grey" type="submit" name="action" style="background-color: #8F8E8F;">Buscar
              </button >
            </div>
          </div>
          {{ Form::close() }}
      </div>
      <div class="col s4 right">
        <a href="{{ route('contact.create') }}" class="btn grey">Agregar</a>
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
            @foreach ($contactos as $contact)
              <tr>
                <td>{{ $contact->nomyap }}</td>
                <td>{{ $contact->correo }}</td>
                <td>{{ $contact->direccion }}</td>
                <td>{{ $contact->provincia }}</td>
                <td>{{ $contact->partido }}</td>
                <td>{{ $contact->localidad }}</td>
                <td>{{ $contact->tellinea }}</td>
                <td>{{ $contact->telcel }}</td>
                <td>{{ $contact->interno }}</td>
              <td><center><a href="{{ route('contact.show', $contact->id) }}" class="btn btn-azul btn-small center-align">Editar</a></center></td>
                <td>
                 {!! Form::open(['method' => 'DELETE','route' => ['contact.destroy', $contact->id]]) !!}
                  <center><a href="#" class="btn btn-rojo btn-small center-align btn-borrar"><i class="material-icons">delete_forever</i></a></center>
                 {!! Form::close() !!} 
                </td>
              </tr>
            @endforeach

        </tbody>
      </table>
    </div>
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Crear agenda</h4>
          <hr>
        <div class="row">
     <form class="col s12" id="modalForm" method="GET" action="{{ route('datoscol.store') }}">
       {{ csrf_field() }}
       <div class="row">
         <div class="input-field col s12">
           <input id="nombre_agenda" type="text" name="nombre_agenda" class="validate" required>
           <label for="nombre_agenda">Nombre de agenda</label>
         </div>
       </div>
       <div class="input-field col s7">
         <button class="btn grey right" type="submit" name="action" form="modalForm">Crear
         </button>
       </div>
     </form>
   </div>

      </div>
    </div>
  @endif
@endsection
@section('script')
<script>
  $(document).ready(function() {
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
  });
</script>
@endsection