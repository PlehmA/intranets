@extends('contact.app')
@section('content')
  @if (Auth::check())
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="{{ route('directorio') }}">Agenda Interna</a></li>
        <li class="active">Agenda Externa</li>
      </ol>
    </div>
    <div class="container-fluid">
      <div class="col s4 right">
        <a href="#" class="btn">Agregar</a>
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
            @foreach ($contactos as $contact)
              <tr>
                <td>{{ $contact->nomyap }}</td>
                <td>{{ $contact->correo }}</td>
                <td>{{ $contact->direccion }}</td>
                <td>{{ $contact->provincia }}</td>
                <td>{{ $contact->partido }}</td>
                <td>{{ $contact->localidad }}</td>
                <td>{{ $contact->tellinea }}</td>
                <td>{{ $contact->telcel }}</td>
                <td>{{ $contact->interno }}</td>
                <td><center><a href="#" class="btn blue btn-small center-align">Editar</a></center></td>
                <td><center><a href="#" class="btn red btn-small center-align"><i class="fas fa-eraser"></i></a></center></td>
              </tr>
            @endforeach

        </tbody>
      </table>
    </div>
  @endif
@endsection
