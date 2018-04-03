@extends('rrhh.app')
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <legend>Listado del Personal</legend>
        </div>
        <div class="panel-body">
           <table class="table table-sm table-striped">
               <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre y Apellido</th>
                    <th>Usuario</th>
                    <th>Num. Legajo</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha Nacimiento</th>
                    <th>Puesto</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
               </thead>
               <tbody>
               @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->num_legajo }}</td>
                        <td>{{ $user->fecha_ingreso }}</td>
                        <td>{{ $user->fecha_nacimiento }}</td>
                        <td>{{ $user->puesto }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{action('PersonalController@update', $user->id)}}" class="btn btn-info btn-sm">Editar</a></td>
                        <td><button class="btn btn-danger btn-sm">Borrar</button></td>
                    </tr>
                   @endforeach
               </tbody>
           </table>
        </div>
    </div>

@endsection