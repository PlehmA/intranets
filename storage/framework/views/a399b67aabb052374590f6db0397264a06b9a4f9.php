<?php $__env->startSection('css'); ?>
<style>
.scrollbar {
    margin-left: 30px;
    float: left;
    height: 300px;
    width: 65px;
    background: #fff;
    overflow-y: scroll;
    margin-bottom: 25px;
}
.force-overflow {
    min-height: 450px;
}

.scrollbar-primary::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-primary::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #4285F4; }

.scrollbar-danger::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-danger::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-danger::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #ff3547; }

.scrollbar-warning::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-warning::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-warning::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #FF8800; }

.scrollbar-success::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-success::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-success::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #00C851; }

.scrollbar-info::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-info::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-info::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #33b5e5; }

.scrollbar-default::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-default::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-default::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #8F8E8F; }

.scrollbar-secondary::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-secondary::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-secondary::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #aa66cc; }
.collection {
  margin-top: -5px;
}
a .material-icons {
  vertical-align: initial;
}
.btn-gris {
  margin-top: 4vh;
}
.form-group.is-focused .form-control {
  background-image: none;
  border-bottom: none;
}
* {
  border-bottom: initial;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php if(Auth::check()): ?>
<div class="container-fluid"> 

<div class="row" style="margin-bottom: 0px;">
  <div class="col-sm-9" style="margin-top: 4vh;">
<a href="<?php echo e(route('tutos.index')); ?>" class="btn grey btn-small">Volver</a>
  </div>

<div class="col-sm-3">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar..." id="buscador">
      <span class="input-group-btn" style="margin-top: 1vh;">
         <i class="material-icons">search</i>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div>

<?php $__currentLoopData = $wroffice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offwr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row">

  <div class="col s9">
<video poster="<?php echo e($offwr->foto_video); ?>" id="player" playsinline controls>
    <source src="<?php echo e(url($offwr->video)); ?>" type="video/mp4">
</video>

  </div>
  <div class="right col s3 scrollbar scrollbar-default" style="height: 59vh;">
    <div class="force-overflow">
<?php $__currentLoopData = $wrmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <ul class="collection">
      <a href="<?php echo e($wroffice->url($menu->id)); ?>">
        <li class="collection-item avatar" style="border-bottom: 1px solid #e0e0e0; background-color: #ddd; color: #444; min-height: 70px;">
          <img src="<?php echo e(asset($menu->foto_video)); ?>" alt="" class="circle">
          <b><span class="title nombres"><?php echo e($menu->titulo); ?></span></b>
        </li>
      </a>
    </ul>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
  <div class="col s3 container">
    <ul class="pagination">
        <li class="waves-effect"><a href="<?php echo e($wroffice->previousPageUrl()); ?>" class="anterior" title="Video anterior"><i class="material-icons">skip_previous</i></a></li>
        <li class="waves-effect"><a href="<?php echo e($wroffice->url($wroffice->currentPage())); ?>"><?php echo e($wroffice->currentPage()); ?></a></li>
        <li class="waves-effect"><a href="<?php echo e($wroffice->nextPageUrl()); ?>" class="siguiente" title="Siguiente video"><i class="material-icons">skip_next</i></a></li>
      </ul>
  </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

  <?php endif; ?>
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('script'); ?>
    <script>
    tippy('.anterior');
    tippy('.siguiente');
    </script>
     <script>
        $(document).ready(function () {
            $('.main-panel').perfectScrollbar('destroy');
        });
        </script>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('tutos.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>