@extends('directorio.app')
@section('content')
  @if (Auth::check())
    <ol class="breadcrumb">
      <li><a href="{{ route('directorio.index') }}">Agenda interna</a></li>
      <li><a href="{{ route('contact.index') }}">Agenda externa</a></li>
      @foreach ($agendas as $agen)
        <li><a href="{{ action('AgendaController@show', $agen->id) }}">{{ $agen->nombre_agenda }}</a></li>
      @endforeach
      <li><a href="#modal1" class="modal-trigger agendapers" title="Crea tu agenda personal!">Agenda Personalizada <i class="fas fa-plus"></i> </a></li>
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
      <br>
      <div class="container-fluid">
        @foreach ($agenda as $agend)
          <h3 class="center">{{ $agend->nombre_agenda }}</h3>
        @endforeach


        <h3 class="center"></h3>
        <div class="col s4 right">
          <a href="#modal2" class="btn btn-gris modal-trigger">Agregar</a>
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
    <td><center><a href="{{ action('ColumnaController@destroy', $agen->id) }}" class="btn btn-azul btn-small center-align">Editar</a></center></td>
    <td><center><a href="#" class="btn btn-rojo btn-small center-align"><i class="material-icons">delete_forever</i></a></center></td>
  </tr>
@endforeach
          </tbody>
        </table>
      </div>
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
    @endif
    @endsection
    @section('scripts')
    <script>
    $(document).ready(function(){
      $('.modal').modal();
    });
    </script>
    @endsection
