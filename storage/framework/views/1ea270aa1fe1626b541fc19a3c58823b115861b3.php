<?php $__env->startSection('content'); ?>
  <?php if(Auth::check()): ?>
    <div class="embed-container">
        <iframe width="560" height="315" src="rainloop" frameborder="0" allowfullscreen></iframe>
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('correo.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>