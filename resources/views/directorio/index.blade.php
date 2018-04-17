@extends('directorio.app')
@section('content')
  @if (Auth::check())
    <div class="container-fluid">
      <table class="table">
        <thead>
          <tr>
            <th>Nombre y Apellido</th>
            <th>Correo</th>
            <th>Area</th>
            <th>Interno</th>
          </tr>
        </thead>
        <tbody>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tbody>
      </table>
    </div>
  @endif
@endsection
