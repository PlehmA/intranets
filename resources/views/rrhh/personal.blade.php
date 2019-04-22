@extends('rrhh.app')
@section('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('css')
    <style>
    .listadoPer{
        color: black;
    }
    .listadoPer a{
        pointer-events: none;
        cursor: default;
        text-decoration: none;
        color: black;
    }
    select{
        display: initial;
    }
    </style>
@endsection 
@section('content')
    <div class="panel">
            @if (session('success'))
            <div class="alert alert-success text-center" style="opacity: 0.6" role="alert" data-dismiss="alert">
                {{ session('success') }}
            </div>
            @endif
        <div class="panel-body">
           <table id="tableX">
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
                        <td>{{ date_format(date_create($user->fecha_ingreso), 'd/m/Y') }}</td>
                        <td>{{ date_format(date_create($user->fecha_nacimiento), 'd/m/Y') }}</td>
                        <td>{{ $user->puesto }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ route('rrhh.show', $user->id)}}" class="btn grey btn-small editar" title="Editar"><i class="far fa-edit"></i></a></td>
                        <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['addpers.destroy', $user->id]]) !!}
                        @csrf
                            <button type="submit" class="btn red btn-small btn-borrar borrar" title="Borrar"><i class="far fa-trash-alt"></i></button>
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
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#tableX').DataTable({
        'language':{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
    });
} );
</script>
<script>
    $(document).ready(function () {
        $('.btn-borrar').click(function(e) {
            e.preventDefault();

        if ( ! confirm('¿Está seguro/a de eliminar al usuario?')) {
        return false;
        }
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        let row  = $(this).parents('tr');
        let form = $(this).parents('form');
        let url  = form.attr('action');

        $.post(url, form.serialize(), function(result) {
            row.fadeOut();
            M.toast({html: result.success});
        /*optional stuff to do after success */
        $("#alert")
        }).fail(function(){
            M.toast({html: 'Algo salió mal'});
        });
        });
    });
   
</script>
@endsection