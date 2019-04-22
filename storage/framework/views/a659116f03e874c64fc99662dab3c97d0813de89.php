<?php $__env->startSection('css'); ?>
<style>
    .content {
        margin-top: 12vh;
    }
h3{
    margin: 0px 0px -50px 0px;
}
@media  only screen and (max-width: 1400px) {
    .card .card-content {
    padding: 24px;
    border-radius: 0 0 2px 2px;
}
.card .card-action {
    background-color: inherit;
    border-top: 1px solid rgba(160, 160, 160, 0.2);
    position: relative;
    padding: 16px 24px;
}

  }
  .main-panel{
    overflow: auto;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(1 == Auth::user()->tipo_rol && 'cmtuozzo' == Auth::user()->username): ?>
<!-- JEFATURA -->
                <div class="row">
                    <h3 class="center-align">Gestiones</h3>
                </div>
                <table id="table_id2">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>De</th>
                            <th>Hasta</th>
                            <th>Hora</th>
                            <th>Días</th>
                            <th>Estado RRHH</th>
                            <th>Estado Jefe</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $autojefatura; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autosjefe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                                <td style="width: 20vh;"><?php echo e($autosjefe->nombre_usuario); ?></td>
                                <td style="width: 50vh;"><?php echo e($autosjefe->tipo_autorizacion); ?></td>
                                <td><?php echo e(date_format($date = date_create($autosjefe->fecha_de), 'd/m/Y')); ?></td>
                                <td><?php echo e(date_format($date = date_create($autosjefe->fecha_hasta), 'd/m/Y')); ?></td>
                                <td><?php echo e(date_format($date = date_create($autosjefe->hora_de), 'H:i')); ?></td>
                                <td><?php echo e($autosjefe->dias_count); ?></td>
                           
                            <?php if(true === $autosjefe->estado_rrhh): ?>
                                <td style="width: 2vh;" title="Aprobado" class="aprobado"><i class="fas fa-check" style="color: #8bc34a;"></i></td>
                            <?php elseif(false === $autosjefe->estado_rrhh): ?>
                                <td style="width: 2vh;" title="Rechazado" class="rechazado"><i class="fas fa-times" style="color: #bf360c;"></i></td>
                            <?php else: ?>
                                <td style="width: 2vh;" title="En espera" class="espera"><i class="far fa-clock"></i></td>
                            <?php endif; ?>
                            <?php if( true === $autosjefe->estado_jefe): ?>
                                <td style="width: 2vh;" title="Aprobado" class="aprobado"><i class="fas fa-check" style="color: #8bc34a;"></i></td>
                            <?php elseif( false === $autosjefe->estado_jefe): ?>
                                <td style="width: 2vh;" title="Rechazado" class="rechazado"><i class="fas fa-times" style="color: #bf360c;"></i></td>
                            <?php else: ?>
                                <td style="width: 2vh;" title="En espera" class="espera"><i class="far fa-clock"></i></td>
                            <!-- <?php var_dump($autosjefe->estado_jefe) ?> -->
                            <?php endif; ?>
                            <td style="width: 2vh;">
                        <?php if(null === $autosjefe->estado_jefe): ?>
                                <?php echo Form::open(['route' => ['autorizaciones.update', $autosjefe->id], 'id' => 'rechaform', 'method' => 'PUT']); ?>

                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="1" name="rechazado">
                                <input type="hidden" name="nombre_envia" value="<?php echo e($autosjefe->nombre_usuario); ?>">
                                    <button title="Rechazar" type="submit" class="btn btn-small grey btn-rech hoverable"><i class="fas fa-times"></i></button>
                                <?php echo Form::close(); ?>

                        <?php endif; ?>
                                </td>
                            <td style="width: 2vh;">
                        <?php if(null === $autosjefe->estado_jefe): ?>
                                <?php echo Form::open(['route' => ['autorizaciones.update', $autosjefe->id], 'id' => 'aceptaform', 'method' => 'PUT']); ?>

                                <?php echo csrf_field(); ?>
                                <input type="hidden"  name="aprobado" value="2">
                                <input type="hidden" name="nombre_envia" value="<?php echo e($autosjefe->nombre_usuario); ?>">
                                    <button title="Aprobar"  type="submit" class="btn btn-small grey btn-apr hoverable"><i class="fas fa-check"></i></button>
                                <?php echo Form::close(); ?>

                        <?php endif; ?>
                        
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                
<!-- JEFATURA -->
    <?php endif; ?>

    <?php if(2 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario): ?>
<!-- JEFATURA -->
                <div class="row">
                    <h3 class="center-align">Gestiones</h3>
                </div>
                <table id="table_id2">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>De</th>
                            <th>Hasta</th>
                            <th>Días</th>
                            <th>Estado RRHH</th>
                            <th>Estado Jefe</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $autorizacionesjefe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autosjefe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                                <td style="width: 20vh;"><?php echo e($autosjefe->nombre_usuario); ?></td>
                                <td style="width: 50vh;"><?php echo e($autosjefe->tipo_autorizacion); ?></td>
                                <td><?php echo e(date_format($date = date_create($autosjefe->fecha_de), 'd/m/Y')); ?></td>
                                <td><?php echo e(date_format($date = date_create($autosjefe->fecha_hasta), 'd/m/Y')); ?></td>
                                <td><?php echo e($autosjefe->dias_count); ?></td>
                           
                            <?php if(true === $autosjefe->estado_rrhh): ?>
                                <td style="width: 2vh;" title="Aprobado" class="aprobado"><i class="fas fa-check" style="color: #8bc34a;"></i></td>
                            <?php elseif(false === $autosjefe->estado_rrhh): ?>
                                <td style="width: 2vh;" title="Rechazado" class="rechazado"><i class="fas fa-times" style="color: #bf360c;"></i></td>
                            <?php else: ?>
                                <td style="width: 2vh;" title="En espera" class="espera"><i class="far fa-clock"></i></td>
                            <?php endif; ?>
                            <?php if( true === $autosjefe->estado_jefe): ?>
                                <td style="width: 2vh;" title="Aprobado" class="aprobado"><i class="fas fa-check" style="color: #8bc34a;"></i></td>
                            <?php elseif( false === $autosjefe->estado_jefe): ?>
                                <td style="width: 2vh;" title="Rechazado" class="rechazado"><i class="fas fa-times" style="color: #bf360c;"></i></td>
                            <?php else: ?>
                                <td style="width: 2vh;" title="En espera" class="espera"><i class="far fa-clock"></i></td>
                            <!-- <?php var_dump($autosjefe->estado_jefe) ?> -->
                            <?php endif; ?>
                            <td style="width: 2vh;">
                        <?php if(null === $autosjefe->estado_jefe): ?>
                                <?php echo Form::open(['route' => ['autorizaciones.update', $autosjefe->id], 'id' => 'rechaform', 'method' => 'PUT']); ?>

                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="1" name="rechazado">
                                <input type="hidden" name="nombre_envia" value="<?php echo e($autosjefe->nombre_usuario); ?>">
                                    <button title="Rechazar" type="submit" class="btn btn-small grey btn-rech hoverable"><i class="fas fa-times"></i></button>
                                <?php echo Form::close(); ?>

                        <?php endif; ?>
                                </td>
                            <td style="width: 2vh;">
                        <?php if(null === $autosjefe->estado_jefe): ?>
                                <?php echo Form::open(['route' => ['autorizaciones.update', $autosjefe->id], 'id' => 'aceptaform', 'method' => 'PUT']); ?>

                                <?php echo csrf_field(); ?>
                                <input type="hidden"  name="aprobado" value="2">
                                <input type="hidden" name="nombre_envia" value="<?php echo e($autosjefe->nombre_usuario); ?>">
                                    <button title="Aprobar"  type="submit" class="btn btn-small grey btn-apr hoverable"><i class="fas fa-check"></i></button>
                                <?php echo Form::close(); ?>

                        <?php endif; ?>
                        
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                
<!-- JEFATURA -->
    <?php endif; ?>
   
    <?php if(2 == Auth::user()->tipo_rol && 5 == Auth::user()->rol_usuario): ?>
        
 <!-- RRHH -->
 <div class="row">
     
     <div id="test1" class="col s12"> 
         <h3 class="center-align">Gestiones</h3>
         <table id="table_id1">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Motivo</th>
                            <th>Sector</th>
                            <th>De</th>
                            <th>Hasta</th>
                            <th>Días</th>
                            <th>Estado RRHH</th>
                            <th>Estado Jefe</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $__currentLoopData = $autorirrhh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autrrhh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
                        <tr>
                            <td style="width: 20vh;"><?php echo e($autrrhh->nombre_usuario); ?></td>
                            <td style="width: 40vh;"><?php echo e($autrrhh->tipo_autorizacion); ?></td>
                            <td style="width: 30vh;"><?php echo e($autrrhh->motivo); ?></td>
                            <td><?php echo e($autrrhh->sector); ?></td>
                            <td><?php echo e(date_format($date = date_create($autrrhh->fecha_de), 'd/m/Y')); ?></td>
                            <td><?php echo e(date_format($date = date_create($autrrhh->fecha_hasta), 'd/m/Y')); ?></td>
                            <td><?php echo e($autrrhh->dias_count); ?></td>
                            <?php if(true === $autrrhh->estado_rrhh): ?>
                            <td style="width: 2vh;" title="Aprobado" class="aprobado"><i class="fas fa-check" style="color: #8bc34a;"></i></td>
                            <?php elseif(false === $autrrhh->estado_rrhh): ?>
                            <td style="width: 2vh;" title="Rechazado" class="rechazado"><i class="fas fa-times" style="color: #bf360c;"></i></td>
                            <?php else: ?>
                            <td style="width: 2vh;" title="En espera" class="espera"><i class="far fa-clock"></i></td>
                            <?php endif; ?>
                            <?php if( true === $autrrhh->estado_jefe): ?>
                            <td style="width: 2vh;" title="Aprobado" class="aprobado"><i class="fas fa-check" style="color: #8bc34a;"></i></td>
                            <?php elseif( false === $autrrhh->estado_jefe): ?>
                            <td style="width: 2vh;" title="Rechazado" class="rechazado"><i class="fas fa-times" style="color: #bf360c;"></i></td>
                            
                            <?php else: ?>
                            <td style="width: 2vh;" title="En espera" class="espera"><i class="far fa-clock"></i></td>
                            <!-- <?php var_dump($autrrhh->estado_jefe) ?> -->
                            <?php endif; ?>

                            <td style="width: 2vh;">
                        <?php if(null === $autrrhh->estado_rrhh): ?>
                                <?php echo Form::open(['route' => ['autorizaciones.update', $autrrhh->id], 'method' => 'PUT']); ?>

                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="1" name="rechazado">
                                    <button title="Rechazar" type="submit" class="btn btn-small grey btn-rech hoverable"><i class="fas fa-times"></i></button>
                                <?php echo Form::close(); ?>

                        <?php endif; ?>
                                </td>
                            <td style="width: 2vh;">
                        <?php if(null === $autrrhh->estado_rrhh): ?>
                                <?php echo Form::open(['route' => ['autorizaciones.update', $autrrhh->id], 'method' => 'PUT']); ?>

                                <?php echo csrf_field(); ?>
                                <input type="hidden"  name="aprobado" value="2">
                                    <button title="Aprobar"  type="submit" class="btn btn-small grey btn-apr hoverable"><i class="fas fa-check"></i></button>
                                <?php echo Form::close(); ?>

                        <?php endif; ?>
                        <?php if(true === $autrrhh->estado_jefe && true === $autrrhh->estado_rrhh && $autrrhh->autorizacion_id == 13): ?>
                    
                        <a href="<?php echo e(action('AutorizationController@show', $autrrhh->id)); ?>" type="submit" class="btn btn-small" style="border:none; background-color: gray !important;" target="_blank">Descargar formulario <i class="fas fa-download"></i></a>
                         
                        <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
    </div>
 <!-- RRHH -->
    <?php endif; ?>
<!-- USUARIOS -->
    <?php if(1 != Auth::user()->tipo_rol): ?>
    <div class="row">
            <?php if(2 != Auth::user()->tipo_rol): ?><h3 class="center-align">Registro de licencias</h3><?php endif; ?>
            <?php if(2 == Auth::user()->tipo_rol): ?> <h3 class="center-align">Mis gestiones</h3> <?php endif; ?>
        </div>
        <table id="table_id3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>De</th>
                    <th>Hasta</th>
                    <th>Días</th>
                    <th>Estado RRHH</th>
                    <th>Estado Jefe</th>
                    <th>&nbsp;</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $autouser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="width: 20vh;"><?php echo e($auser->nombre_usuario); ?></td>
                    <td style="width: 70vh;"><?php echo e($auser->tipo_autorizacion); ?></td>
                     
                    <td><?php echo e(date_format($date = date_create($auser->fecha_de), 'd/m/Y')); ?></td>
                    <td><?php echo e(date_format($date = date_create($auser->fecha_hasta), 'd/m/Y')); ?></td>
                    <td><?php echo e($auser->dias_count); ?></td>
                    <?php if(true === $auser->estado_rrhh): ?>
                    <td style="width: 2vh;" title="Aprobado" class="aprobado"><i class="fas fa-check" style="color: #8bc34a;"></i></td>
                    <?php elseif(false === $auser->estado_rrhh): ?>
                    <td style="width: 2vh;" title="Rechazado" class="rechazado"><i class="fas fa-times" style="color: #bf360c;"></i></td>
                    <?php else: ?>
                    <td style="width: 2vh;" title="En espera" class="espera"><i class="far fa-clock"></i></td>
                    <?php endif; ?>
                    <?php if( true === $auser->estado_jefe): ?>
                    <td style="width: 2vh;" title="Aprobado" class="aprobado"><i class="fas fa-check" style="color: #8bc34a;"></i></td>
                    <?php elseif( false === $auser->estado_jefe): ?>
                    <td style="width: 2vh;" title="Rechazado" class="rechazado"><i class="fas fa-times" style="color: #bf360c;"></i></td>
                    <?php else: ?>
                    <td style="width: 2vh;" title="En espera" class="espera"><i class="far fa-clock"></i></td>
                    <!-- <?php var_dump($auser->estado_jefe) ?> -->
                    <?php endif; ?>
                    <td style="width: 2vh;">
            <?php if(true === $auser->estado_jefe && true === $auser->estado_rrhh && $auser->autorizacion_id == 13): ?>
                    
                    <a href="<?php echo e(action('AutorizationController@show', $auser->id)); ?>" type="submit" class="btn btn-small" style="border:none; background-color: gray !important;" target="_blank">Descargar formulario <i class="fas fa-download"></i></a>
                     
            <?php endif; ?>
                    </td>
                   
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
<!-- USUARIOS -->
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('javascript'); ?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/autofill/2.3.0/js/dataTables.autoFill.min.js"></script>
<script>
    $(document).ready(function(){
        $('.tabs').tabs();
    });

    tippy('.test1');
    tippy('.test2');
    tippy('.test3');
    tippy('.test4');
    tippy('.test5');
    tippy('.test6');
    tippy('.test7');
    tippy('.test8');
    tippy('.test9');
    tippy('.espera');
    tippy('.aprobado');
    tippy('.rechazado');
    tippy('.btn-rech'); 
    tippy('.btn-apr'); 
</script>
<script>
$(document).ready( function () {
    $('#table_id1').DataTable({
        "ordering": true,
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

    $('#table_id2').DataTable({
        "ordering": true,
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
    $('#table_id3').DataTable({
        "ordering": true,
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
    $('select').toggleClass("browser-default");
    $('input').toggleClass("browser-default");
    
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>