<?php $__env->startSection('content'); ?>
<?php if(Auth::check()): ?>

<?php if(session('success')): ?>
    <div class="container alert alert-success text-center" role="alert" data-dismiss="alert">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="container alert alert-danger text-center" role="alert" data-dismiss="alert">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

      <h4 class="center">Agregar de agenda externa</h4>
        <hr>

        <?php $__currentLoopData = $agenda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="row">

          <div class="col s12">

            <a href="<?php echo e(route('agenda.show', $ag->id)); ?>" class="btn btn-gris right">Volver</a>
          </div>
          <form action="<?php echo e(route('agenda.store', $ag->id )); ?>" method="POST">
              <?php echo e(csrf_field()); ?>

          <table id="tableagenda">
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th><b>Nombre y apellido</b></th>
                <th><b>Correo</b></th>
                <th><b>Dirección</b></th>
                <th><b>Partido</b></th>
                <th><b>Localidad</b></th>
                <th><b>Provincia</b></th>
                <th><b>Tel. Línea</b></th>
                <th><b>Tel. Celular</b></th>
                <th><b>Interno</b></th>
              </tr>
            </thead>
            <tbody id="cuerpo">

                  
                  <?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                  <td><p><label><input type="checkbox" name="checkOk[]" value="<?php echo e($contact->id); ?>"/><span></span></label></p></td>
                  <td><?php echo e($contact->nomyap); ?></td>
                  <td><?php echo e($contact->correo); ?></td>
                  <td><?php echo e($contact->direccion); ?></td>
                  <td><?php echo e($contact->provincia); ?></td>
                  <td><?php echo e($contact->partido); ?></td>
                  <td><?php echo e($contact->localidad); ?></td>
                  <td><?php echo e($contact->tellinea); ?></td>
                  <td><?php echo e($contact->telcel); ?></td>
                  <td><?php echo e($contact->interno); ?></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
               


            </tbody>
          </table>
          <div class="input-field col s7">
              <input type="hidden" name="nombre_agenda" value="<?php echo e($ag->nombre_agenda); ?>">
              <input type="hidden" name="id_agenda" value="<?php echo e($ag->id); ?>">
              <button class="btn btn-gris waves-effect waves-light right" type="submit" name="action">Agregar
              
              </button>
             </div>
        </form>
      

  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('directorio.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>