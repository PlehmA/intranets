 
<?php $__env->startSection('css'); ?>
    <style>
    .content{
        margin-top: 8vh;
    }
    .alert{
        background-color: lightgray;
    }
    select {
    display: initial;
}
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
<div class="container">
        <?php if(session('success')): ?>
                <div class="alert alert-success center-align">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
        <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>
    <button class="btn grey right" onclick="location.href='<?php echo e(route('noticia.index')); ?>'">Volver</button>
        <div class="col-sm-12 col-md-6 col-md-offset-2 col-lg-6 col-lg-offset-2">
                <?php echo Form::open(['route' => 'files.store', 'files' => true, 'method' => 'POST', 'enctype' =>'multipart/form-data']); ?>

                    <?php echo csrf_field(); ?>
                    <?php if($errors->any()): ?>
                    <div class="alert animated fadeIn">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="input-field col s6">
                    <input id="nomImagen" type="text" class="validate" name="nomImagen">
                    <label for="nomImagen">Nombre de la imagen</label>
                  </div>
                    <div class="row">
                            <div class="file-field input-field col-md-10">
                                    <div class="btn grey">
                                      <span>Archivo</span>
                                      <input type="file" multiple class="archivo" name="archivo[]" id="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" placeholder="Sube uno o mas archivos" readonly>
                                    </div>
                                  </div>
                                  <div class="col-md-2" style="margin-top: 2vh;">
                                            <button class="boton btn btn-small grey" disabled="disabled">Subir</button>
                                    </div>        
                    </div> 
                
                <?php echo Form::close(); ?>

                </div>
                <div id="imagePreview"></div>
            </div>
<div class="col s12 m3 l3 xl3">
    <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Miniatura</th>
                    <th>Nombre</th>
                    <th>URL</th>
                    <th>Tamaño</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $archivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($archivo->id); ?>

                </td>
                <td>
                    <img src="storage/<?php echo e($archivo->nombre); ?>" alt="" class="miniImagen">
                </td>
                <td>
                    <p class="nimagen"><?php echo e($archivo->nomImagen); ?></p>
                </td>
                <td>
                    <a href="<?php echo e($archivo->url); ?>"><?php echo e($archivo->url); ?></a>
                </td>
                <td>
                    <?php echo e(round(($archivo->tamanio / 1048576), 2)); ?> MB 
                </td>
                <td>
                    
                <a href="<?php echo e(route('files.edit', $archivo->id)); ?>" class="btn grey modal-trigger btneditar"><i class="fas fa-pencil-alt"></i></a>
                </td>
                <td>
                    <button class="btn grey btncopy copiar" data-clipboard-text="<?php echo e($archivo->url); ?>" title="Copiar enlace">
                        <i class="fas fa-clipboard"></i>
                        </button>
                </td>
                <td>
                        <?php echo Form::open(['route' => ['files.destroy', $archivo->id], 'method' => 'DELETE']); ?>

                        <button type="submit" class="btn grey"><i class="far fa-trash-alt"></i></button>
                      <?php echo Form::close(); ?>

                </td>
            </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Miniatura</th>
                    <th>URL</th>
                    <th>Tamaño</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </tfoot>
        </table>
 
        
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<script>
    tippy('.editar');
    tippy('.eliminar');
    tippy('.noticia');
    tippy('.copiar');
</script>
<script>
  $(".archivo").change(function(){
        $(".boton").prop("disabled", this.files.length == 0);
    });
</script>
<script>
$(document).ready(function () {
    $('.alert').click(function (e) { 
        e.preventDefault();
        $('.alert').hide();
    });
});
</script>
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
<script src="<?php echo e(asset('js/clipboard.min.js')); ?>"></script>
<script>
        var clipboard = new ClipboardJS('.btncopy');
            clipboard.on('success', function(e) {
                console.log(e);
            });
            clipboard.on('error', function(e) {
                console.log(e);
            });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>