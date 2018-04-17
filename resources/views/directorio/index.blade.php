@extends('directorio.app')
@section('content')
  @if (Auth::check())
    <div class="row">
    <div class="col s6">
      <ul class="tabs">
        <li class="tab col s6"><a href="{{ route('directorio.index') }}" class="active">Directorio Interno</a></li>
        <li class="tab col s6"><a href="#test2">Directorio Externo</a></li>
      </ul>
    </div>
  </div>
    <div class="container-fluid">
      <table class="table highlight responsive-table">
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
