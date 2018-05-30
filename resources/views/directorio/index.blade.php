@extends('directorio.app')
@section('content')
  @if (Auth::check())
    <ol class="breadcrumb">
      <li class="active">Agenda interna</li>
      <li><a href="{{ route('contact.index') }}">Agenda externa</a></li>
      <li><a href="#modal1" class="modal-trigger agendapers" title="Crea tu agenda personal!">Agenda Personalizada <i class="fas fa-plus"></i> </a></li>
    </ol>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Agregar agenda</h4>
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
    <br>
    @if (session('success'))
        <div class="container alert alert-success text-center" role="alert" data-dismiss="alert">
            {{ session('success') }}
        </div>
    @endif
    <br>
    @if (session('error'))
        <div class="container alert alert-warning text-center" role="alert" data-dismiss="alert">
            {{ session('error') }}
        </div>
    @endif
    <br>
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
            <a href="{{ route('directorio.index') }}">
              <button class="btn waves-effect waves-light btn-small" type="reload" name="action" style="background-color: #8F8E8F;">
              <i class="material-icons" style="font-size: 2rem;">refresh</i>
            </button>
          </a>
          </div>
        </div>
        {{ Form::close() }}
    </div>
    <div class="container">



<div class="right">
{{ $usuarios->render() }}
</div>


      <table class="table highlight responsive-table table-bordered">
        <thead>
          <tr>
            <th><b>Nombre y apellido</b></th>
            <th><b>Correo</b></th>
            <th><b>Área</b></th>
            <th><b>Interno</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $dir)
            <tr>
              <td>{{ $dir->name }}</td>
              <td>{{ $dir->email }}</td>
              <td>{{ $dir->puesto }}</td>
              <td>{{ $dir->interno }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="right">
      {{ $usuarios->render() }}
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
