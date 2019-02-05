 
<?php $__env->startSection('css'); ?>
<style>
    .plantillas img {
        max-width: 10vh;
    }
    .plantillas a {
        margin-left: -1vh;
        line-height: 2;
    }
    .main-panel{
        height: calc(100% - 30px) !important;
    }
.content{
    margin-top: 12vh;
}
</style>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
<div class="row">
    
    <div class="col-md-12">
        <h4 class="text-center">Carga de plantillas</h4>
    </div>
    <div class="col-md-12">
    <a href="<?php echo e(route('plantillas.index')); ?>" class="btn grey right">Volver</a>
    </div>
    
    <div class="row">
        
        <div class="col s12 xl4 offset-xl4">
            
                <?php echo Form::open(['method' => 'POST', 'route' => 'plantillas.store', 'enctype' => 'multipart/form-data']); ?>

                <?php echo e(csrf_field()); ?>

            <div class="input-field col s12">
                    <select name="rol_usuario">
                        <?php $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($puesto->id); ?>"><?php echo e($puesto->nombre_puesto); ?></option>
    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label>Puesto</label>
                  </div>

                  <div class="file-field input-field">
                        <div class="btn grey">
                          <span>Foto</span>
                          <input type="file" name="foto">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text" readonly>
                        </div>
                      </div>

                    <div class="file-field input-field">
                            <div class="btn grey">
                              <span>Plantilla</span>
                              <input type="file" name="plantilla">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" readonly>
                            </div>
                    </div>

                    <div class="input-field">
                        <input id="titulo" type="text" name="titulo" class="validate">
                        <label for="titulo">Título</label>
                    </div>
                    
                    <button type="submit" class="btn grey right">Cargar</button>
                    <?php echo Form::close(); ?>




                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    

        </div>

        

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
        $('select').formSelect();

    $('.alert').click(function (e) { 
        e.preventDefault();
        $('.alert').css('display', 'none');
    });
    });
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>