<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.4/dist/sweetalert2.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class='container'>
    <div style='text-align: center;'>
    <img src="<?php echo e(asset('images/imagenevento.png')); ?>">
    </div>
    <br>
  <div style='text-align: center;'>
      <p style='text-align: center; font-size: 20px;'><b><?php echo e($usuario->name); ?></b> te ha invitado al envento.</p>
          <p style='text-align: center; font-size: 20px;'><b><?php echo e($arrey['title']); ?></b></p>
          <?php if( $arrey['descripcion'] != ""): ?>
          <p style='text-align: center; font-size: 20px;'>Observación: <b><?php echo e($arrey['descripcion']); ?></b></p>
          <?php endif; ?>
          <p style='text-align: center; font-size: 20px;'>Fecha: <b><?php echo e(date_format(date_create($arrey['start']), 'd/m/Y')); ?></b></p>
          <p style='text-align: center; font-size: 20px;'>Hora: <b><?php echo e(date_format(date_create($arrey['start']), 'H:i:s')); ?> </b></p>
    </div>
    <br>
    <div style='text-align: center;'>
    <input type="hidden" value="<?php echo e($arrey['id_usuario']); ?>" class="input-id_usuario">
    <input type="hidden" value="<?php echo e($arrey['start']); ?>" class="input-start">
    <input type="hidden" value="<?php echo e($arrey['descripcion']); ?>" class="input-descripcion">
    <input type="hidden" value="<?php echo e($arrey['title']); ?>" class="input-title">
    <?php if($existe >= 1): ?>
    <p class="center-align">Ya tienes el mismo evento cargado.</p>
    <button class="btn grey" onclick="location.href='<?php echo e(route('calendar.index')); ?>'">Volver al calendario</button>
    <?php else: ?>
    <button class="btn grey btn-mandar">Aceptar invitación</button>

    <button class="btn grey" onclick="location.href='<?php echo e(route('calendar.index')); ?>'">Rechazar invitación</button>
    <?php endif; ?>
    
    </div>
    <hr>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsscript'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.4/dist/sweetalert2.all.min.js"></script>
<script>
    

$(document).ready(function () {
$('.btn-mandar').click(function (e) { 
    e.preventDefault();
   
    var id = $('.input-id_usuario').val();
    var start = $('.input-start').val();
    var descripcion = $('.input-descripcion').val();
    var title = $('.input-title').val();

axios.post('/calguardar', {
    id_usuario: id,
    start: start,
    descripcion: descripcion,
    title: title
})
.then(function (response) {
swal({
  title: 'Felicitaciones',
  text: response.data,
  type: 'success',
  confirmButtonText: 'Volver'
}).then((result) => {
        if (result.value) {
   location.href ="<?php echo e(route('calendar.index')); ?>";
  }
    });
  })
  .catch(function (error,response) {

    swal({
        title: 'Error!',
        text: error.response.data.errMsg,
        type: 'error',
        confirmButtonText: 'Volver'
    });
 
  });

// swal({
//   title: 'Anda!',
//   text: 'Do you want to continue',
//   type: 'success',
//   confirmButtonText: 'Cool'
// });
    
});


});


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('calendario.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>