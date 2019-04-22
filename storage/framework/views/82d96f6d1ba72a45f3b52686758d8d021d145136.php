<?php $__env->startSection('css'); ?>
<style>
@media  only screen and (max-width: 1400px){
.main-panel {
    padding: 0px 45px;
}
.main-panel>.content {
    padding: 0px 30px;
    margin-top: 50px;
}
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="animado valign-wrapper"> <!-- ACA EMPIEZA SLIDER -->

        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
      <div class="card hoverable">
          <div class="card-image">
            <img src="<?php echo e(asset('storage/images/'.$noticia->foto)); ?>">
            <span class="card-title"><?php echo e($noticia->titulo); ?></span>
          </div>
          <div class="card-content">
              <?php if(strlen($noticia->atajo) >= 270): ?>
            <p><?php echo e(substr_replace($noticia->atajo, '...', 270)); ?></p>
            <?php else: ?>
            <p><?php echo e($noticia->atajo); ?></p>
            <?php endif; ?>
          </div>
          <div class="card-action">
            <a href="<?php echo e(route('noticia.show', $noticia->id)); ?>"  target="_blank"><b>Ver mas...</b></a>
          </div>
        </div>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div><!-- ACA TERMINA SLIDER -->
</div>

<?php if($newsblack->count() >= 1 && $modal == 0): ?>


 <!-- Modal Structure -->
 <div id="myModal" class="modals">

        <!-- Modal content -->
        <div class="modals-content">
            <div class="slider-modal">
                    <?php $__currentLoopData = $newsblack; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div>
                        <a href="<?php echo e(route('noticia.show', $noticia->id)); ?>" target="_blank">
                            <img src="<?php echo e(asset('storage/images/'.$noticia->foto)); ?>">
                        </a>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <div>
                <?php echo Form::open(['route' => 'modal.store', 'method' => 'POST']); ?>

                <?php echo csrf_field(); ?>
                <input type="hidden" name="sbid" value="<?php echo e(Auth::user()->id); ?>">
                <input type="hidden" name="nov_vista" value="true">
                <button type="submit" class="btn grey hoverable btn-aceptar">Continuar</button>
                <?php echo Form::close(); ?>   
            </div>
        </div>
      </div>
<?php else: ?>

<?php endif; ?>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('javascript'); ?>
    <script>
      $(document).ready(function () {
        $('.main-panel').perfectScrollbar('destroy');
        $('.animado').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
      });

var modal = $('#myModal');

// Get the <span> element that closes the modal
var span = $(".close")[0];

$(modal).css('display', 'block');

// When the user clicks on <span> (x), close the modal
$(span).click(function (e) { 
    e.preventDefault();
    $(modal).css('display', 'none');
});
$('.slider-modal').slick({
    infinite: false,
});

    // On swipe event
// var cantidad = <?php echo e($news->count()); ?>;
// // On before slide change
// $('.slider-modal').on('beforeChange', function(event, slick, currentSlide, nextSlide){
//     // console.log(nextSlide);
//     // console.log(currentSlide);
//   if((cantidad-1) == nextSlide){
//       $('.btn-aceptar').css('display', 'block');
//   }
// });

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>