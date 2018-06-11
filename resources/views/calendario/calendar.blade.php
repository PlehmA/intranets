@extends('calendario.app')
@section('content')

<a href="#modal1" class="modal-trigger">modal</a>

<div id='calendar'></div>


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
    @endsection
@section('jsscript')
  <script>
      const eventos = {!! json_encode($eventos) !!};
      console.log(eventos);
  </script>
  <script>
    $(document).ready(function() {
      $('.modal').modal();
    });
  </script>
@endsection
