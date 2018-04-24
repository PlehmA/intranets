@extends('directorio.app')
@section('content')
  @if (Auth::check())
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Agenda interna</li>
        <li><a href="{{ route('contact.index') }}">Agenda externa</a></li>
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
    </div>
  @endif
@endsection
