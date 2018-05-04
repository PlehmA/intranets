@extends('contact.app')
@section('content')
  @if (Auth::check())
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="{{ route('directorio') }}">Agenda Interna</a></li>
        <li class="active">Agenda Externa</li>
      </ol>
      <table class="table highlight responsive-table table-bordered">
        <thead>
          <tr>
            <th><b>Nombre y Apellido</b></th>
            <th><b>Correo</b></th>
            <th><b>Area</b></th>
            <th><b>Interno</b></th>
          </tr>
        </thead>
        <tbody>

            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>

        </tbody>
      </table>
    </div>
  @endif
@endsection
