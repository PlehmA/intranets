@extends('directorio.app')
@section('content')
  @if (Auth::check())
    <ol class="breadcrumb">
      <li><a href="{{ route('directorio.index') }}">Agenda interna</a></li>
      <li><a href="{{ route('contact.index') }}">Agenda externa</a></li>
      @foreach ($agenda as $agend)
        <li><a href="{{ action('AgendaController@show', $agend->id) }}">{{ $agend->nombre_agenda }}</a></li>
      @endforeach
      <li><a href="#modal1" class="modal-trigger agendapers" title="Crea tu agenda personal">Crear agenda <i class="fas fa-plus"></i> </a></li>
    </ol>

  <!-- Modal Structure -->
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
       <button class="btn waves-effect waves-light right grey" type="submit" name="action" form="modalForm">Crear
         
       </button>
     </div>
   </form>
 </div>

    </div>
  </div>
    <div class="container">
  <h3 class="center">Agenda interna</h3>
    </div>
    @if (session('success'))
        <div class="container alert alert-success text-center" role="alert" data-dismiss="alert">
            {{ session('success') }}
        </div>
    @endif
    <br>
    @if (session('error'))
        <div class="container alert alert-danger text-center" role="alert" data-dismiss="alert">
            {{ session('error') }}
        </div>
    @endif
    <br>
   
    <div class="container">
      <table id="tableagenda">
        <thead>
          <tr>
            <th><b>Interno</b></th>
            <th><b>Nombre y apellido</b></th>
            <th><b>Correo</b></th>
            <th><b>Área</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $dir)
            <tr>
              <td>{{ $dir->interno }}</td>
              <td>{{ $dir->name }}</td>
              <td>{{ $dir->email }}</td>
              <td>{{ $dir->puesto }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
    $('.modal').modal();

    $('#tableagenda').DataTable({
      "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            }

    });
    $('select').formSelect();

  });
</script>
@endsection
