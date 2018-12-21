<?php $__env->startSection('content'); ?>
  <?php if(Auth::check()): ?>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(route('directorio.index')); ?>">Agenda interna</a></li>
      <li><a href="<?php echo e(route('contact.index')); ?>">Agenda externa</a></li>
      <?php $__currentLoopData = $agendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a href="<?php echo e(action('AgendaController@show', $agen->id)); ?>"><?php echo e($agen->nombre_agenda); ?></a></li>
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
         <button class="btn grey waves-effect waves-light right" type="submit" name="action" form="modalForm">Crear
           
         </button>
       </div>
     </form>
   </div>

      </div>
    </div>

    <div id="alert" class="container alert alert-success text-center" role="alert" data-dismiss="alert" style="display: none; font-size: 16px;"></div>
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
        <?php $__currentLoopData = $agenda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <h3 class="center"><?php echo e($agend->nombre_agenda); ?></h3>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo Form::open(['method' => 'DELETE','route' => ['agenda.destroy', $agend->id]]); ?>

<a href="#" class="btn grey left btn-agendabr">Borrar agenda <i class="material-icons">delete_forever</i></a>
<?php echo Form::close(); ?>

<div class="row col s12">
  <div class="col s4 left">
    <?php echo e($datos->render()); ?>

  </div>
  <div class="col s8 right">
    <a href="<?php echo e(route('datoscol.show', $agend->id)); ?>" class="btn grey right">Importar contactos</a>
    <a href="#modal2" class="btn grey modal-trigger right">Agregar contacto</a>
  </div>
</div>

<div class="row">
  <?php echo e(Form::open(['route' => 'directorio.index', 'method' => 'GET', 'class' => 'col s12'])); ?>

   <?php echo csrf_field(); ?>
    <div class="row">
      <div class="input-field offset-s2 col s2">
        <?php echo e(Form::text('name', null, ['class' => 'validate', 'id' => 'nom_ape'])); ?>

        <label for="nom_ape">Nombre y apellido</label>
      </div>
      <div class="input-field col s2">
        <?php echo e(Form::text('email', null, ['class' => 'validate', 'id' => 'email'])); ?>

        <label for="email">Correo</label>
      </div>
      <div class="input-field col s2">
        <?php echo e(Form::text('area', null, ['class' => 'validate', 'id' => 'area'])); ?>

        <label for="area">Área</label>
      </div>
      <div class="input-field col s3">
        <button class="btn grey waves-effect waves-light btn-small" type="submit" name="action" style="background-color: #8F8E8F;">Buscar
          <i class="material-icons right">search</i>
        </button >
      </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>


        <table class="table responsive-table table-bordered">
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
<?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $columna): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <td><?php echo e($columna->nomyap); ?></td>
    <td><?php echo e($columna->correo); ?></td>
    <td><?php echo e($columna->direccion); ?></td>
    <td><?php echo e($columna->provincia); ?></td>
    <td><?php echo e($columna->partido); ?></td>
    <td><?php echo e($columna->localidad); ?></td>
    <td><?php echo e($columna->tellinea); ?></td>
    <td><?php echo e($columna->telcel); ?></td>
    <td><?php echo e($columna->interno); ?></td>
    <td><center><a href="<?php echo e(route('datoscol.edit', $columna->id)); ?>" class="btn grey btn-small center editar" title="Editar"><i class="material-icons">edit</i></a></center></td>
    <td><center>
      <?php echo Form::open(['method' => 'DELETE','route' => ['datoscol.destroy', $columna->id]]); ?>

      <a href="#" class="btn grey btn-borrar center borrar" title="Borrar"><i class="material-icons">delete_forever</i></a>
      <?php echo Form::close(); ?>

    </center></td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </tbody>
        </table>
      </div>
    <?php echo e($datos->render()); ?>

      <div id="modal2" class="modal">
        <div class="modal-content">
          <h4>Agregar contacto</h4>
            <hr>
          <div class="row">
            <form class="" action="<?php echo e(route('datoscol.store')); ?>" method="POST" id="modalForm1">
              <?php echo e(csrf_field()); ?>

              <div class="row">
                <div class="input-field col s7 offset-s2">
                  <input id="nomyap" type="text" class="validate" required name="nomyap">
                  <label for="nomyap">Nombre y Apellido</label>
                </div>
              <div class="input-field col s7 offset-s2">
                <input id="correo" type="text" class="validate" required name="correo">
                <label for="correo">Correo</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="direccion" type="text" class="validate" name="direccion">
                <label for="direccion">Dirección</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="partido" type="text" class="validate" name="partido">
                <label for="partido">Partido</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="localidad" type="text" class="validate" name="localidad">
                <label for="localidad">Localidad</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="provincia" type="text" class="validate" name="provincia">
                <label for="provincia">Provincia</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="tellinea" type="text" class="validate" name="tellinea">
                <label for="tellinea">Tel. Línea</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="telcel" type="text" class="validate" name="telcel">
                <label for="telcel">Tel. Celular</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="interno" type="number" class="validate" name="interno">
                <label for="interno">Interno</label>
              </div>
              <div class="input-field col s7 offset-s2">
                <input id="nombre_agenda" type="hidden" class="validate" required name="nombre_agenda" value="<?php echo e($agend->nombre_agenda); ?>">

              </div>
              <div class="input-field col s7 offset-s2">
                <input id="id_agenda" type="hidden" class="validate" required name="id_agenda" value="<?php echo e($agend->id); ?>">

              </div>
         <div class="input-field col s7">
           <button class="btn grey waves-effect waves-light right" type="submit" name="action" form="modalForm1">Agregar
             
           </button>
         </div>
       </form>
     </div>
   </div>
  </div>
</div>

</div>
    <?php endif; ?>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('scripts'); ?>
    <script>
    $(document).ready(function(){
      $('.modal').modal();

      $('#alert').hide();
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

var url = '<?php echo e(route('directorio.store')); ?>';
      $('#formcheck').click(function(){
        var checked = []
          $("input[name='check[]']:checked").each(function ()
          {
              checked.push(parseInt($(this).val()));
          });
          $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
           $.ajax({
              url: url,
             type: 'POST',
             data: checked
           })
           .fail(function() {
             console.log("error");
           });
      });


    $('.btn-agendabr').click(function(){

      if ( ! confirm('¿Está seguro/a de eliminar la agenda?')) {
        return false;
      }

      let form = $(this).parents('form');
      let url  = form.attr('action');

      $.post(url, form.serialize(), function(result) {
        window.location='<?php echo e(route('directorio.index')); ?>';
        alert(result.success);
        /*optional stuff to do after success */
      }).fail(function(){
        $('#alert').html('Algo salió mal');
      });
    });
    });
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('directorio.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>