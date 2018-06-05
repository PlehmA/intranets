@extends('directorio.app')
@section('content')
  @if (Auth::check())
    @foreach ($coledit as $co)

    @endforeach
    <a href="{{ route('agenda.show', $co->id_agenda) }}" class="btn btn-gris right">Volver</a>
    <h4 class="center">Actualizar contacto</h4>
      <hr>
    <div class="row">
      @foreach ($coledit as $col)
      <form class="" action="{{ route('datoscol.update', $col->id) }}" method="PUT" id="form1">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s5 offset-s3">
            <input id="nomyap" type="text" class="validate" name="nomyap">
            <label for="nomyap">{{ $col->nomyap }}</label>
          </div>
        <div class="input-field col s5 offset-s3">
          <input id="correo" type="text" class="validate" name="correo">
          <label for="correo">{{ $col->correo }}</label>
        </div>
        <div class="input-field col s5 offset-s3">
          <input id="direccion" type="text" class="validate" name="direccion">
          <label for="direccion">{{ $col->direccion }}</label>
        </div>
        <div class="input-field col s5 offset-s3">
          <input id="partido" type="text" class="validate" name="partido">
          <label for="partido">{{ $col->partido }}</label>
        </div>
        <div class="input-field col s5 offset-s3">
          <input id="localidad" type="text" class="validate" name="localidad">
          <label for="localidad">{{ $col->localidad }}</label>
        </div>
        <div class="input-field col s5 offset-s3">
          <input id="provincia" type="text" class="validate" name="provincia">
          <label for="provincia">{{ $col->provincia }}</label>
        </div>
        <div class="input-field col s5 offset-s3">
          <input id="tellinea" type="text" class="validate" name="tellinea">
          <label for="tellinea">{{ $col->tellinea }}</label>
        </div>
        <div class="input-field col s5 offset-s3">

          <input id="telcel" type="text" class="validate" name="telcel">
          <label for="telcel">{{ $col->telcel }}</label>
        </div>
        <div class="input-field col s5 offset-s3">
          <input id="interno" type="number" class="validate" name="interno">
          <label for="interno">{{ $col->interno }}</label>
        </div>
   <div class="input-field col s7">
     <button class="btn btn-gris waves-effect waves-light right" type="submit" name="action" form="form1">Actualizar
       <i class="material-icons right">send</i>
     </button>
   </div>
   @endforeach
 </form>
</div>
  @endif
  @endsection
