@extends('agendapers.app')
@section('content')
    @if (Auth::check())
      <ol class="breadcrumb">

        <li><a href="{{ route('directorio.index') }}">Agenda Interna</a></li>
        <li><a href="{{ route('contact.index') }}">Agenda externa</a></li>
        <li class="active">Agenda Personalizada</li>

        </ol>
        <div class="container-fluid">
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

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><center><a href="#" class="btn blue btn-small center-align">Editar</a></center></td>
                    <td><center><a href="#" class="btn red btn-small center-align"><i class="material-icons">delete_forever</i></a></center></td>
                  </tr>

            </tbody>
          </table>
        </div>
      </ol>
        @endif
  @endsection
