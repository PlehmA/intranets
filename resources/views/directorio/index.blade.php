@extends('directorio.app')
@section('content')
  @if (Auth::check())
    <ol class="breadcrumb">
      <li><a href="{{ route('directorio.index') }}">Agenda interna</a></li>
      <li><a href="{{ route('contact.index') }}">Agenda externa</a></li>
      @foreach ($agenda as $agend)
        <li><a href="{{ action('AgendaController@show', $agend->id) }}">{{ $agend->nombre_agenda }}</a></li>
      @endforeach
      <li><a href="#modal1" class="modal-trigger agendapers" title="Crea tu agenda personal">Agenda Personalizada <i class="fas fa-plus"></i> </a></li>
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
       <button class="btn waves-effect waves-light right" type="submit" name="action" form="modalForm">Crear
         <i class="material-icons right">send</i>
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

              <button class="btn waves-effect waves-light btn-small" type="refresh" name="action" style="background-color: #8F8E8F;">
              <i class="material-icons" style="font-size: 2rem;">refresh</i>
            </button>
      
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
