@extends('rrhh.app')
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <legend>Listado del Personal</legend>
        </div>
        <div class="panel-body">
            
                {{ $users->render() }}
          
           <table class="table table-sm table-striped">
               <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre y Apellido</th>
                    <th>Usuario</th>
                    <th>Num. Legajo</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha Nacimiento</th>
                    <th>Área</th>
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
                        <td><a href="{{ route('rrhh.show', $user->id)}}" class="btn grey btn-small">Editar</a></td>
                        <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['rrhh.destroy', $user->id]]) !!}
                            <button type="submit" class="btn red btn-small btn-borrar">Eliminar</button>
                        {!! Form::close() !!}
                        </td>
                    </tr>
                   @endforeach
               </tbody>
           </table>
        </div>
    </div>

@endsection
@section('javascript')
<script>
    $(document).ready(function () {
        $('.btn-borrar').click(function() {

        if ( ! confirm('¿Está seguro/a de eliminar al personal?')) {
        return false;
        }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        let form = $(this).parents('form');
        let url  = form.attr('action');

        $.post(url, form.serialize(), function(result) {
        window.location='{{route('notes.index')}}';
        /*optional stuff to do after success */
        }).fail(function(){
        alert('Algo salió mal');
        });
        });
    });
   
</script>
@endsection