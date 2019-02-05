<?php $__env->startSection('content'); ?>
  <?php if(Auth::check()): ?>
  <div class="container">
    <div class="col s7 right-align">
      <a href="<?php echo e(route('contact.index')); ?>" class="btn grey">Volver</a>
    </div>

    <?php if(session('success')): ?>

      <div class="alert alert-success col-sm-7 text-center" role="alert" data-dismiss="alert"><strong><?php echo e(session('success')); ?></strong></div>

    <?php endif; ?>
<br>
    <div class="col s12">
      
            <?php echo Form::open(['method' => 'PUT','route' => ['contact.update', $contact->id]]); ?>

        <?php echo e(csrf_field()); ?>

        <div class="row">
          <div class="input-field col s7">
            <input id="nomyap" type="text" class="validate" name="nomyap" value="<?php echo e($contact->nomyap); ?>">
            
          </div>
        <div class="input-field col s7">
          <input id="correo" type="text" class="validate" name="correo" value="<?php echo e($contact->correo); ?>">
          
        </div>
        <div class="input-field col s7">
          <input id="direccion" type="text" class="validate" name="direccion" value="<?php echo e($contact->direccion); ?>">
          
        </div>
        <div class="input-field col s7">
          <input id="partido" type="text" class="validate" name="partido" value="<?php echo e($contact->partido); ?>">
          
        </div>
        <div class="input-field col s7">
          <input id="localidad" type="text" class="validate" name="localidad" value="<?php echo e($contact->localidad); ?>">
          
        </div>
        <div class="input-field col s7">
          <input id="provincia" type="text" class="validate" name="provincia" value="<?php echo e($contact->provincia); ?>">
          
        </div>
        <div class="input-field col s7">
          <input id="tellinea" type="text" class="validate" name="tellinea" value="<?php echo e($contact->tellinea); ?>">
          
        </div>
        <div class="input-field col s7">
          <input id="telcel" type="text" class="validate" name="telcel" value="<?php echo e($contact->telcel); ?>">
         
        </div>
        <div class="input-field col s7">
          <input id="interno" type="text" class="validate" name="interno" value="<?php echo e($contact->interno); ?>">
          
        </div>
        <div class="col s7 right-align">
          <input type="submit" name="" value="Actualizar" class="btn pulse grey">
        </div>
      </div>
      <?php echo Form::close(); ?>


    </div>

    <div class="container">
      <div class="offset-s6 col s6">
        <a href="index"></a>
      </div>
    </div>
  </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('contact.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>