
<?php $__env->startSection('css'); ?>
<?php echo toastr_css(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
<a href="<?php echo e(url('sistemas')); ?>" class="btn grey right">Volver</a>
    <div class="container">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-title">
                            ¿Desea actualizar datos de <?php echo e($tutorial->name); ?>?
                        </div>
                    </div>
                    <div class="panel-body">
                            <?php echo Form::open(['route' => ['tutoriales/update', $tutorial->id], 'method' => 'put', 'files' => true]); ?>

            
            
                            <div class="input-field col-sm-12 col-md-10 col-md-offset-1">
                                    <i class="material-icons prefix">account_circle</i>
                                <input id="icon_prefix" type="text" name="nombreTuto" value="<?php echo e($tutorial->name); ?>">
                                  </div>
                            
                                  <input type="hidden" name="imgName" value="<?php echo e($tutorial->image); ?>">

                            <div class="file-field input-field col-sm-12 col-md-10 col-md-offset-1">
                                    <div class="btn">
                                      <span class="grey">Imagen</span>
                                      <input type="file" class="grey" name="newImage">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path" value="<?php echo e($tutorial->image); ?>" type="text">
                                    </div>
                                  </div>

                            <div class="col-sm-12 col-md-12 col-lg-4 col-lg-offset-5">
                                <button class="btn grey" type="submit">Modificar</button>
                            </div>

                            <?php echo Form::close(); ?>

                    </div>
                </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<?php echo toastr_js(); ?>
<?php echo app('toastr')->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>