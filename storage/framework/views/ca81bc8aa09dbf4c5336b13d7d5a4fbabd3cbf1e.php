<?php $__env->startSection('content'); ?>
  <?php if(Auth::check()): ?>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(route('directorio.index')); ?>">Agenda interna</a></li>
      <li><a href="<?php echo e(route('contact.index')); ?>">Agenda externa</a></li>
      <?php $__currentLoopData = $agenda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a href="<?php echo e(action('AgendaController@show', $agend->id)); ?>"><?php echo e($agend->nombre_agenda); ?></a></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <li><a href="#modal1" class="modal-trigger agendapers" title="Crea tu agenda personal">Crear agenda <i class="fas fa-plus"></i> </a></li>
    </ol>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Crear agenda</h4>
        <hr>
      <div class="row">
   <form class="col s12" id="modalForm" method="GET" action="<?php echo e(route('agenda.create')); ?>">
     <?php echo e(csrf_field()); ?>

     <div class="row">
       <div class="input-field col s12">
         <input id="nombre_agenda" type="text" name="nombre_agenda" class="validate" required>
         <label for="nombre_agenda">Nombre de agenda</label>
       </div>
     </div>
     <div class="input-field col s7">
       <button class="btn waves-effect waves-light right grey" type="submit" name="action" form="modalForm">Crear
         
       </button>
     </div>
   </form>
 </div>

    </div>
  </div>
    <div class="container">
  <h3 class="center">Agenda interna</h3>
    </div>
    <?php if(session('success')): ?>
        <div class="container alert alert-success text-center" role="alert" data-dismiss="alert">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <br>
    <?php if(session('error')): ?>
        <div class="container alert alert-danger text-center" role="alert" data-dismiss="alert">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <br>
   
    <div class="container">
      <table id="tableagenda">
        <thead>
          <tr>
            <th><b>Interno</b></th>
            <th><b>Nombre y apellido</b></th>
            <th><b>Correo</b></th>
            <th><b>Área</b></th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($dir->interno); ?></td>
              <td><?php echo e($dir->name); ?></td>
              <td><?php echo e($dir->email); ?></td>
              <td><?php echo e($dir->puesto); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
    $('.modal').modal();

    $('select').formSelect();
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('directorio.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>