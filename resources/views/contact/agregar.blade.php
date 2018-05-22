@extends('contact.app')
@section('content')
  @if (Auth::check())
  <div class="container">
    <div class="col s7 right-align">
      <a href="{{ route('contact.index') }}" class="btn blue lighten-2">Volver</a>
    </div>

    @if (session('add'))

      <div class="alert alert-success col-sm-7" role="alert" data-dismiss="alert"><strong>{{ session('add') }}</strong></div>

    @endif
<br>
    <div class="col s12">
      <form class="" action="{{ route('contact.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s7">
            <input id="nomyap" type="text" class="validate" required name="nomyap">
            <label for="nomyap">Nombre y Apellido</label>
          </div>
        <div class="input-field col s7">
          <input id="correo" type="text" class="validate" required name="correo">
          <label for="correo">Correo</label>
        </div>
        <div class="input-field col s7">
          <input id="direccion" type="text" class="validate" name="direccion">
          <label for="direccion">Dirección</label>
        </div>
        <div class="input-field col s7">
          <input id="partido" type="text" class="validate" name="partido">
          <label for="partido">Partido</label>
        </div>
        <div class="input-field col s7">
          <input id="localidad" type="text" class="validate" name="localidad">
          <label for="localidad">Localidad</label>
        </div>
        <div class="input-field col s7">
          <input id="provincia" type="text" class="validate" name="provincia">
          <label for="provincia">Provincia</label>
        </div>
        <div class="input-field col s7">
          <input id="tellinea" type="text" class="validate" name="tellinea">
          <label for="tellinea">Tel. Línea</label>
        </div>
        <div class="input-field col s7">
          <input id="telcel" type="text" class="validate" name="telcel">
          <label for="telcel">Tel. Celular</label>
        </div>
        <div class="input-field col s7">
          <input id="interno" type="text" class="validate" name="interno">
          <label for="interno">Interno</label>
        </div>
        <div class="col s7 right-align">
          <input type="submit" name="" value="Agregar" class="btn pulse">
        </div>
      </div>
      </form>
    </div>
    <div class="container">
      <div class="offset-s6 col s6">
        <a href="index"></a>
      </div>
    </div>
  </div>
  @endif
@endsection
