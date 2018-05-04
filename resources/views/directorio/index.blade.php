@extends('directorio.app')
@section('content')
  @if (Auth::check())

    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Agenda interna</li>
        <li><a href="{{ route('contact.index') }}">Agenda externa</a></li>
      </ol>

<div class="row">
  {{ Form::open(['route' => 'directorio', 'method' => 'GET', 'class' => 'col s12']) }}
   @csrf
    <div class="row">
      <div class="input-field col s3">
        {{ Form::text('name', null, ['class' => 'validate', 'id' => 'nom_ape']) }}
        <label for="nom_ape">Nombre y apellido</label>
      </div>
      <div class="input-field col s3">
        {{ Form::text('email', null, ['class' => 'validate', 'id' => 'email']) }}
        <label for="email">Correo</label>
      </div>
      <div class="input-field col s3">
        {{ Form::text('area', null, ['class' => 'validate', 'id' => 'area']) }}
        <label for="area">Área</label>
      </div>
      <div class="input-field col s3">
        <button class="btn waves-effect waves-light btn-small" type="submit" name="action">Buscar
          <i class="material-icons right">search</i>
        </button>
        <a href="{{ route('directorio') }}">
          <button class="btn waves-effect waves-light btn-small" type="reload" name="action">
          <i class="material-icons" style="font-size: 2rem;">refresh</i>
        </button>
      </a>
      </div>
    </div>
    {{ Form::close() }}
</div>
<div class="right">
{{ $usuarios->render() }}
</div>


      <table class="table highlight responsive-table table-bordered">
        <thead>
          <tr>
            <th><b>Nombre y apellido</b></th>
            <th><b>Correo</b></th>
            <th><b>Área</b></th>
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
      <div class="right">
      {{ $usuarios->render() }}
      </div>
    </div>
  @endif
@endsection
