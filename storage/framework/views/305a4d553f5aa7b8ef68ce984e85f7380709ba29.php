<?php $__env->startSection('content'); ?>
  <?php if(Auth::check()): ?>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(route('directorio.index')); ?>">Agenda interna</a></li>
      <li><a href="<?php echo e(route('contact.index')); ?>">Agenda externa</a></li>
      <?php $__currentLoopData = $agenda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a href="<?php echo e(action('AgendaController@show', $agend->id)); ?>"><?php echo e($agend->nombre_agenda); ?></a></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <li><a href="#modal1" class="modal-trigger agendapers" title="Crea tu agenda personal!">Crear agenda <i class="fas fa-plus"></i> </a></li>
    </ol>
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
         <button class="btn grey right" type="submit" name="action" form="modalForm">Crear
           
         </button>
       </div>
     </form>
   </div>

      </div>
    </div>

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

    <div class="container-fluid">
      <h3 class="center">Agenda externa</h3>
      </div>
      <div class="col s4 right">
        <a href="<?php echo e(route('contact.create')); ?>" class="btn grey">Agregar</a>
      </div>
      <table id="tableagenda">
        <thead>
          <tr>
            <th><b>Nombre y apellido</b></th>
            <th><b>Correo</b></th>
            <th><b>Dirección</b></th>
            <th><b>Partido</b></th>
            <th><b>Localidad</b></th>
            <th><b>Provincia</b></th>
            <th><b>Tel. Línea</b></th>
            <th><b>Tel. Celular</b></th>
            <th><b>Interno</b></th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($contact->nomyap); ?></td>
                <td><?php echo e($contact->correo); ?></td>
                <td><?php echo e($contact->direccion); ?></td>
                <td><?php echo e($contact->provincia); ?></td>
                <td><?php echo e($contact->partido); ?></td>
                <td><?php echo e($contact->localidad); ?></td>
                <td><?php echo e($contact->tellinea); ?></td>
                <td><?php echo e($contact->telcel); ?></td>
                <td><?php echo e($contact->interno); ?></td>
              <td><center><a href="<?php echo e(route('contact.show', $contact->id)); ?>" class="btn btn-azul btn-small center-align">Editar</a></center></td>
                <td>
                 <?php echo Form::open(['method' => 'DELETE','route' => ['contact.destroy', $contact->id]]); ?>

                  <center><a href="#" class="btn btn-rojo btn-small center-align btn-borrar"><i class="material-icons">delete_forever</i></a></center>
                 <?php echo Form::close(); ?> 
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
      </table>
    </div>
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Crear agenda</h4>
          <hr>
        <div class="row">
     <form class="col s12" id="modalForm" method="GET" action="<?php echo e(route('datoscol.store')); ?>">
       <?php echo e(csrf_field()); ?>

       <div class="row">
         <div class="input-field col s12">
           <input id="nombre_agenda" type="text" name="nombre_agenda" class="validate" required>
           <label for="nombre_agenda">Nombre de agenda</label>
         </div>
       </div>
       <div class="input-field col s7">
         <button class="btn grey right" type="submit" name="action" form="modalForm">Crear
         </button>
       </div>
     </form>
   </div>

      </div>
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  $(document).ready(function() {
    $('.btn-borrar').click(function(e){
      
        e.preventDefault();
        if ( ! confirm('¿Está seguro/a de eliminar el contacto?')) {
          return false;
        }

        let row  = $(this).parents('tr');
        let form = $(this).parents('form');
        let url  = form.attr('action');


        $('#alert').show();

        $.post(url, form.serialize(), function(result) {
          row.fadeOut();
          $('#alert').html(result.success);
          /*optional stuff to do after success */
        }).fail(function(){
          $('#alert').html('Algo salió mal');
        });
  });
  });
</script>
<script>
  $(document).ready(function () {
    $('select').formSelect();
    $('#tableagenda').DataTable({
      "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            }

    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('contact.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>