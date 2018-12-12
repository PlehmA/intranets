@extends('directorio.app')
@section('content')
  @if (Auth::check())
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
    @foreach ($coledit as $co)

    @endforeach
    <a href="{{ route('agenda.show', $co->id_agenda) }}" class="btn btn-gris right">Volver</a>
    <h4 class="center">Actualizar contacto</h4>
      <hr>
    <div class="row">
      @foreach ($coledit as $col)
      <form class="" action="{{ route('datoscol.update', $col->id) }}" method="POST" >
        <input type="hidden" name="_method" value="put" />
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s5 offset-s3">
            <input id="nomyap" type="text" class="validate" name="nomyap" value="{{ $col->nomyap }}">
            <label for="nomyap">Nombre y Apellido</label>
          </div>
        <div class="input-field col s5 offset-s3">
          <input id="correo" type="text" class="validate" name="correo" value="{{ $col->correo }}">
          <label for="correo">Correo</label>
        </div>
        <div class="input-field col s5 offset-s3">
          <input id="direccion" type="text" class="validate" name="direccion" value="{{ $col->direccion }}">
          <label for="direccion">Dirección</label>
        </div>
        <div class="input-field col s5 offset-s3">
          <input id="partido" type="text" class="validate" name="partido" value="{{ $col->direccion }}">
          <label for="partido">Partido</label>
        </div>
        <div class="input-field col s5 offset-s3">
          <input id="localidad" type="text" class="validate" name="localidad" value="{{ $col->localidad }}">
          <label for="localidad">Localidad</label>
        </div>
        <div class="input-field col s5 offset-s3">
          <input id="provincia" type="text" class="validate" name="provincia" value="{{ $col->provincia }}">
          <label for="provincia">Provincia</label>
        </div>
        <div class="input-field col s5 offset-s3">
          <input id="tellinea" type="text" class="validate" name="tellinea" value="{{ $col->tellinea }}">
          <label for="tellinea">Telefono de linea</label>
        </div>
        <div class="input-field col s5 offset-s3">

          <input id="telcel" type="text" class="validate" name="telcel" value="{{ $col->telcel }}">
          <label for="telcel">Telefono Celular</label>
        </div>
        <div class="input-field col s5 offset-s3">
          <input id="interno" type="number" class="validate" name="interno" value="{{ $col->interno }}">
          <label for="interno">Interno</label>
        </div>
        <input type="hidden" name="agendaId" value="{{ $col->id_agenda }}">
   <div class="input-field col s7">
     <button class="btn btn-gris waves-effect waves-light right" type="submit" name="submit" >Actualizar
       
     </button>
   </div>
   @endforeach
 </form>
</div>

  @endif
  @endsection
