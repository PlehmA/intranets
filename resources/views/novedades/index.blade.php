@extends('layouts.app')
@section('css')
    <style>
    select {
    display: initial;
}
.miniImagen{
    height: 7vh;
    width: 7vh;
}
    </style>
@endsection
@section('content')
<div class="container-fluid" style="margin-top: 7vh;">
    <div class="col s12">
        <div class="row">
            <h3 class="center-align">Listado de entradas</h3>
        </div>
    </div>
    <div class="col s12">
        <div class="row">

            {{ $news->render() }}
            <a href="{{ url('files') }}" class="btn grey hoverable right">Imágenes</a>
            <a href="{{ route('noticia.create') }}" class="btn grey hoverable right">Crear nueva</a>

            <table id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Miniatura</th>
                        <th>Titulo</th>
                        <th>Atajo</th>
                        <th>Fecha noticia</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $notis)
                    
                    <tr onclick="window.href='{{ route('noticia.index') }}'">
                        <td>{{ $notis->id }}</td>
                        <td><img src="{{ asset('storage/images/'.$notis->foto) }}" class="miniImagen" alt=""></td>
                        <td style="width: 30vh;">{{ $notis->titulo }}</td>
                        <td class="truncate" style="width: 50vh;">{{ $notis->atajo }}</td>
                        <td>{{ date_format($date =date_create($notis->fecha_noticia), 'd/m/Y') }}</td>
                        <td>
                                <a href="{{ route('noticia.edit', $notis->id) }}" class="btn btn-small grey editar hoverable" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['noticia.destroy', $notis->id]]) !!} 
                                    {{ csrf_field() }}
                                <a class="btn btn-small grey eliminar hoverable btn-eliminar" title="Eliminar">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                {!! Form::close() !!}
                            </td>
                            <td>
                                <a href="{{ route('noticia.show', $notis->id) }}" target="_blank" class="btn btn-small grey noticia hoverable" title="Ver noticia">
                                            <i class="fas fa-link"></i>
                                        </a>
                            </td>
                        
                    </tr>
         
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 
@section('javascript')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        "order": [[ 0, "desc" ]],
        "language": {
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
    tippy('.editar');
    tippy('.eliminar');
    tippy('.noticia');
</script>

<script>
    $(document).ready(function () {
        $(".btn-eliminar").click(function (e) {
            e.preventDefault();
        if ( ! confirm('¿Está seguro/a de eliminar el articulo?')) {
                return false;
            }
            var form = $(this).parents('form');
            var row = $(this).parents('tr');
            var url = form.attr('action');

        $.post(url, form.serialize(), function(result) {
                row.fadeOut();
                M.toast({html: result.success});
            /*optional stuff to do after success */

            }).fail(function(){
                M.toast({html: 'Algo salió mal'});
            });

        });
    });
</script>
@endsection