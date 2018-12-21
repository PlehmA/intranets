<?php $__env->startSection('style'); ?>
<style>
#frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
    margin: 5px 0 0 0;
    padding: 0 0 1px;
    font-weight: 400;
    white-space: nowrap;
    overflow: unset;
    text-overflow: ellipsis;
    -moz-transition: 1s all ease;
    -o-transition: 1s all ease;
    -webkit-transition: 1s all ease;
    transition: 1s all ease;
}
#frame #sidepanel #contacts ul li.contact .wrap {
    width: 88%;
    margin: 0 auto;
    position: relative;
    height: 4vh;
}
.hollow-dots-spinner, .hollow-dots-spinner * {
      box-sizing: border-box;
    }

    .hollow-dots-spinner {
      height: 15px;
      width: calc(30px * 3);
      left: 35%;
      top: 50%;
      position: absolute;
    }

    .hollow-dots-spinner .dot {
      width: 15px;
      height: 15px;
      margin: 0 calc(15px / 2);
      border: calc(15px / 5) solid #8c8c8c;
      border-radius: 50%;
      float: left;
      transform: scale(0);
      animation: hollow-dots-spinner-animation 1000ms ease infinite 0ms;
    }

    .hollow-dots-spinner .dot:nth-child(1) {
      animation-delay: calc(300ms * 1);
    }

    .hollow-dots-spinner .dot:nth-child(2) {
      animation-delay: calc(300ms * 2);
    }

    .hollow-dots-spinner .dot:nth-child(3) {
      animation-delay: calc(300ms * 3);

    }

    @keyframes  hollow-dots-spinner-animation {
      50% {
        transform: scale(1);
        opacity: 1;
      }
      100% {
        opacity: 0;
      }
    }
@media  only screen and (max-width: 1400px) {

.title-spinner{
    top: 40%;
    left: 35%;
    position: relative;
    color: #8c8c8c;
  }
}
@media  only screen and (min-width: 1400px) {

.title-spinner{
    top: 43%;
    left: 35%;
    position: relative;
    color: #8c8c8c;
  }
}
.fondo-spinner{
    position: fixed;
    height: 100vh;
    width: 200vh;
    z-index: 999;
    margin-top: -2vh;
    margin-left: -1vh;
    background-color: rgba(238, 238, 238, 0.9);
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('chatent'); ?>
  <?php if(Auth::check()): ?>
  <div id="frame">
      <div class="fondo-spinner">
        <div class="title-spinner">
          <h4>Uitalk</h4>
        </div>
        <div class="hollow-dots-spinner">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </div>
      </div>
        
    <chat :user="<?php echo e(Auth::user()); ?>" :mensajes="mensajes"></chat>
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
setTimeout(() => {
     $('.fondo-spinner').css('display', 'none');
     }, 2500);

</script>
<script>
$(document).ready(function () {
  $('.messages').animate({ scrollTop: $('.messages')[0].scrollHeight}, 1);
});
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('uichat.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>