@extends('directorio.app')
@section('content')
@if (Auth::check())
@foreach ($agenda as $ag)

@endforeach
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
      <h4>Agregar de agenda externa</h4>
        <hr>
      <div class="row">
          {{ csrf_field() }}
          <div class="col s12">
            <a href="{{ route('agenda.show', $ag->id) }}" class="btn btn-gris right">Volver</a>
          </div>
          <table>
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th><b>Nombre y apellido</b></th>
                <th><b>Correo</b></th>
                <th><b>Dirección</b></th>
                <th><b>Partido</b></th>
                <th><b>Localidad</b></th>
                <th><b>Provincia</b></th>
                <th><b>Tel. Línea</b></th>
                <th><b>Tel. Celular</b></th>
                <th><b>Interno</b></th>
              </tr>
            </thead>
            <tbody id="cuerpo">


                <form action="{{ route('agenda.store', $ag->id ) }}" id="form1" method="POST">
                  {{ csrf_field() }}
                  @foreach ($contactos as $contact)
                <tr>

                  <td><p><label><input type="checkbox" name="checkOk[]" value="{{ $contact->id }}"/><span></span></label></p></td>
                  <td>{{ $contact->nomyap }}</td>
                  <td>{{ $contact->correo }}</td>
                  <td>{{ $contact->direccion }}</td>
                  <td>{{ $contact->provincia }}</td>
                  <td>{{ $contact->partido }}</td>
                  <td>{{ $contact->localidad }}</td>
                  <td>{{ $contact->tellinea }}</td>
                  <td>{{ $contact->telcel }}<input type="hidden" name="nombre_agenda" value="{{ $ag->nombre_agenda }}"></td>
                  <td>{{ $contact->interno }} <input type="hidden" name="id_agenda" value="{{ $ag->id }}"></td>

                </tr>
                @endforeach
                </form>


            </tbody>
          </table>

       <div class="input-field col s7">
         <button class="btn btn-gris waves-effect waves-light right" type="submit" name="action" id="formcheck" form="form1">Agregar
           <i class="material-icons right">send</i>
         </button>
        </div>

  </div>


@endif
@endsection
