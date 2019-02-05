 
<?php $__env->startSection('css'); ?>
<style>
    .plantillas img {
        max-width: 10vw;
        height: 15vh;
        margin: 0 auto;
        text-align: center;
    }
    .plantillas a {
        display: block;
        text-align: center;
        color: grey;
    }
    .main-panel{
        overflow: auto;
    }
/* .content{
    margin-top: 10vh;
} */
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php if(Auth::user()->rol_usuario==3): ?>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(route('plantillas.create')); ?>" class="btn grey right">Cargar plantilla</a>
        </div>    
    </div>
    
    <?php endif; ?>
    <div class="row">
        <?php $__currentLoopData = $plantillas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plantilla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col s12 l2 xl2 plantillas">
            <img src="<?php echo e(asset($plantilla->foto)); ?>" alt="asd" class="materialboxed z-depth-2">
            <br>
        <a href="<?php echo e($plantilla->enlace); ?>" target="_blank"><?php echo e($plantilla->titulo); ?></a>
        </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php if(0 == $plantillas->count()): ?>
    <div class="col s12">
        <h6 class="center-align"> No hay plantillas disponibles... <i class="far fa-sad-tear fa-2x"></i></h6>
    </div>
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
    });
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>