<?php $__env->startSection('css'); ?>
    <style>
.miniImagen{
    height: 7vh;
    width: 7vh;
}
.main-panel{
    overflow: auto;
}
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="col s12">
        <div class="row">
            <h3 class="center-align">Listado de entradas</h3>
        </div>
    </div>
    <div class="col s12">
        <div class="row">

            <?php echo e($news->render()); ?>

            <a href="<?php echo e(url('files')); ?>" class="btn grey hoverable right">Imágenes</a>
            <a href="<?php echo e(route('noticia.create')); ?>" class="btn grey hoverable right">Crear nueva</a>

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
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr onclick="window.href='<?php echo e(route('noticia.index')); ?>'">
                        <td><?php echo e($notis->id); ?></td>
                        <td><img src="<?php echo e(asset('storage/images/'.$notis->foto)); ?>" class="miniImagen" alt=""></td>
                        <td style="width: 30vh;"><?php echo e($notis->titulo); ?></td>
                        <td class="truncate" style="width: 50vh;"><?php echo e($notis->atajo); ?></td>
                        <td><?php echo e(date_format($date =date_create($notis->fecha_noticia), 'd/m/Y')); ?></td>
                        <td>
                                <a href="<?php echo e(route('noticia.edit', $notis->id)); ?>" class="btn btn-small grey editar hoverable" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['noticia.destroy', $notis->id]]); ?> 
                                    <?php echo e(csrf_field()); ?>

                                <a class="btn btn-small grey eliminar hoverable btn-eliminar" title="Eliminar">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <?php echo Form::close(); ?>

                            </td>
                            <td>
                                <a href="<?php echo e(route('noticia.show', $notis->id)); ?>" target="_blank" class="btn btn-small grey noticia hoverable" title="Ver noticia">
                                            <i class="fas fa-link"></i>
                                        </a>
                            </td>
                        
                    </tr>
         
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('javascript'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>