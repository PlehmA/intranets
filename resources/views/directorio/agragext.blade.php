@extends('directorio.app')
@section('content')
@if (Auth::check())

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

      <h4 class="center">Agregar de agenda externa</h4>
        <hr>

        @foreach ($agenda as $ag)
      <div class="row">

          <div class="col s12">

            <a href="{{ route('agenda.show', $ag->id) }}" class="btn btn-gris right">Volver</a>
          </div>
          <form action="{{ route('agenda.store', $ag->id ) }}" method="POST">
              {{ csrf_field() }}
          <table id="tableagenda">
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
                  <td>{{ $contact->telcel }}</td>
                  <td>{{ $contact->interno }}</td>

                </tr>
                @endforeach
             
               


            </tbody>
          </table>
          <div class="input-field col s7">
              <input type="hidden" name="nombre_agenda" value="{{ $ag->nombre_agenda }}">
              <input type="hidden" name="id_agenda" value="{{ $ag->id }}">
              <button class="btn btn-gris waves-effect waves-light right" type="submit" name="action">Agregar
              
              </button>
             </div>
        </form>
      

  </div>
@endforeach

@endif
@endsection
