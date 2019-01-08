<?php $__env->startSection('content'); ?>
  <?php if(Auth::check()): ?>
  
    <div class="embed-container">
     

          <iframe width="560" height="315" src="roundcube?_task=login&email=<?php echo e(base64_encode(Auth::user()->email)); ?>&contra_mail=<?php echo e(base64_encode(Auth::user()->contra_mail)); ?>" frameborder="0" allowfullscreen></iframe>
          
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('correo.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>