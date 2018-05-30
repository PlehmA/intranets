@extends('directorio.app')
@section('content')
  @if (Auth::check())
    <ol class="breadcrumb">
      <li><a href="{{ route('directorio.index') }}">Agenda interna</a></li>
      <li><a href="{{ route('contact.index') }}">Agenda externa</a></li>
      @foreach ($agendas as $agenda)
        <li style="color: gray;"><a href="{{ action('AgendaController@show', ['Agenda' => $agenda->nombre_agenda, 'id' => Auth::user()->id]) }}">{{ $agenda->nombre_agenda }}</a></li>
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
         <div class="input-field col s6">
           <input id="nombre_agenda" type="text" name="nombre_agenda" class="validate" required>
           <label for="nombre_agenda">Nombre de agenda</label>
         </div>
         <div class="input-field col s6">
           <input id="col1" type="text" name="col1" class="validate">
           <label for="col1">Columna 1</label>
         </div>
       </div>
       <div class="row">
         <div class="input-field col s6">
           <input id="col2" type="text" name="col2" class="validate">
           <label for="col2">Columna 2</label>
         </div>
         <div class="input-field col s6">
           <input id="col3" type="text" name="col3" class="validate">
           <label for="col3">Columna 3</label>
         </div>
       </div>
       <div class="row">
         <div class="input-field col s6">
           <input id="col4" type="text" name="col4" class="validate">
           <label for="col4">Columna 4</label>
         </div>
         <div class="input-field col s6">
           <input id="col5" type="text" name="col5" class="validate">
           <label for="col5">Columna 5</label>
         </div>
       </div>
       <div class="row">
         <div class="input-field col s6">
           <input id="col6" type="text" name="col6" class="validate">
           <label for="col6">Columna 6</label>
         </div>
         <div class="input-field col s6">
           <input id="col7" type="text" name="col7" class="validate">
           <label for="col7">Columna 7</label>
         </div>
       </div>
       <div class="row">
         <div class="input-field col s6">
           <input id="col8" type="text" name="col8" class="validate">
           <label for="col8">Columna 8</label>
         </div>
         <div class="input-field col s6">
           <input id="col9" type="text" name="col9" class="validate">
           <label for="col9">Columna 9</label>
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

        <h3 class="center">{{ $agendas->nombre_agenda[$id] }}</h3>

        <h3 class="center"></h3>
        <div class="col s4 right">
          <a href="{{ route('contact.create') }}" class="btn">Agregar</a>
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

                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><center><a href="#" class="btn blue btn-small center-align">Editar</a></center></td>
                  <td><center><a href="#" class="btn red btn-small center-align"><i class="material-icons">delete_forever</i></a></center></td>
                </tr>


          </tbody>
        </table>
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
