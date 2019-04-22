
<?php $__env->startSection('content'); ?>
<div class="container">
<div class="panel panel-warning">
        <div class="panel-heading">
                <div class="row" style="margin-bottom: 0;">
                        <div class="col s6">
                                <h3 class="panel-title" style="margin-top: 21px;">Editar área</h3>
                        </div>
                        <div class="col s6">
                                <a href="<?php echo e(route('sistemas')); ?>" class="btn grey right">Volver</a>
                        </div>
                </div>
              </div>
              <div class="panel-body">
                                <div class="col s12 m12">
                                <?php echo Form::open(['route' => ['puesto.update', $puesto->id], 'method' => 'put']); ?>

                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                                <div class="col s12 m8 offset-m2">
                                                        <input type="text" name="nombre_puesto" value="<?php echo e($puesto->nombre_puesto); ?>" class="form-control">
                                                </div>
                                                <div class="col s8 offset-s2 m2">
                                                 
                                                        <span class="input-group-btn">
                                                                        <button class="btn grey" type="submit" style="margin-top: 35px;">Modificar</button>
                                                                </span>
                                                </div>
                                        </div>
                                        <?php echo Form::close(); ?>

                                </div>
              </div>
</div>
<?php if(session('success')): ?>
    <div class="alert brown lighten-4 animated fadeIn text-center">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert red lighten-3 animated fadeIn text-center">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
$(".alert").click(function (e) { 
        e.preventDefault();
  $(".alert").hide();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>