<?php $__env->startSection('css'); ?>
<style>
    .reportePer{
        color: black;
    }
    .reportePer a{
      pointer-events: none;
      cursor: default;
      text-decoration: none;
      color: black;
    }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main id="report">
    <div class="row">
        <div class="col-lg-3">
                <p>
                        <label>
                          <input class="with-gap" name="group1" type="radio" v-model="row" value="1"/>
                          <span>Reporte anual</span>
                        </label>
                      </p>
        </div>
        <div class="col-lg-3">
                <p>
                    <label>
                        <input class="with-gap" name="group1" type="radio" v-model="row" value="2"/>
                        <span>Reporte por período</span>
                    </label>
                    </p>
        </div>
    </div>



<form action="<?php echo e(route('report.create')); ?>" class="col-lg-4" v-if="row == 1" method="GET">
    <?php echo csrf_field(); ?>
            <select class="browser-default" name="user_id">
                    <option value="0" selected>Todos</option>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <select class="browser-default" name="anioanual">
                      <?php $__currentLoopData = $anios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($anio->fecha); ?>"><?php echo e($anio->fecha); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <div class="col-lg-12">
                            <button class="btn grey btn-block">Consultar reporte</button>
                          </div>
    </form>





    <form action="<?php echo e(route('report.store')); ?>" class="col-lg-4" v-if="row == 2" method="POST">
        <?php echo csrf_field(); ?>
            <select class="browser-default" name="user_id">
                    <option value="0" selected>Todos</option>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <br>
                  <div class="row">
                      <div class="col-lg-6">
                            <label for="diadesde">Desde: </label><input type="date" name="fecha_de" id="diadesde" value="<?php echo e(date('Y-m-d')); ?>">
                      </div>
                      <div class="col-lg-6">
                            <label for="diahasta">Hasta: </label><input type="date" name="fecha_hasta" id="diahasta" value="<?php echo e(date('Y-m-d')); ?>">
                      </div>
                  </div>
                  <div class="col-lg-12">
                    <button class="btn grey btn-block">Consultar reporte</button>
                  </div>
                
    </form>



</main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script>
    new Vue({ 
        el: '#report',
        data () {
            return {
                column: null,
                row: null,
                }
            }
    })
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('rrhh.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>