<?php $__env->startSection('css'); ?>
<style>
    .ingresoPer{
        color: black;
    }
    .ingresoPer a{
      pointer-events: none;
      cursor: default;
      text-decoration: none;
      color: black;
    }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="container"><!-- Container -->
    
    <div class="panel"><!-- Panel -->
        <?php if(session('success')): ?>
        <div class="container alert alert-success text-center" role="alert" data-dismiss="alert">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>

    
          <?php echo Form::open(['method' => 'POST', 'route' => 'addpers.store', 'class' => 'form-horizontal']); ?>

                  <?php echo csrf_field(); ?>
                      <div class="row"><!-- Row -->
                        
                        <div class="input-field col s6">
                            <input id="name" type="text" class="validate" name="name" autocomplete="off" required>
                            <label for="name">Nombre y Apellido</label>
                            <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="animated fadeIn" data-error="wrong"><?php echo e($errors->first('name')); ?></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                        <div class="input-field col s6">
                          <input id="username" type="text" class="validate" name="username" autocomplete="off" required>
                          <label for="username">Nombre de usuario</label>
                              <span class="helper-text">Primera letra de los nombres y el apellido completo. Ej: cmtuozzo</span>
 
                          <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->get('username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="animated fadeIn" data-error="wrong" data-success="right"><?php echo e($errors->first('username')); ?></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        
                      </div><!-- Row -->
                      <div class="row"><!-- Row -->

                       <div class="input-field col s4">
                        
                        <select class="browser-default" name="rol_usuario" required>
                          <option value="" disabled selected>Elegir sector...</option>
                          <?php $__currentLoopData = $puesto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puestos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($puestos->id); ?>"><?php echo e($puestos->nombre_puesto); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->get('rol_usuario'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="animated fadeIn" data-error="wrong" data-success="right"><?php echo e($errors->first('rol_usuario')); ?></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                       </div>

                        <div class="input-field col s4">
                          <input id="num_legajo" type="number" class="validate" name="num_legajo" autocomplete="off" required>
                          <label for="num_legajo">Número de legajo</label>
                          <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                          <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->get('num_legajo'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="animated fadeIn" data-error="wrong" data-success="right"><?php echo e($errors->first('num_legajo')); ?></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                        <div class="input-field col s4">
                          <input id="fecha_nacimiento" type="date" class="validate" name="fecha_nacimiento" autocomplete="off">
                          <label for="fecha_nacimiento">Fecha de nacimiento</label>
                          <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                          <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->get('fecha_nacimiento'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="animated fadeIn" data-error="wrong" data-success="right"><?php echo e($errors->first('fecha_nacimiento')); ?></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                      </div><!-- Row -->

                      <div class="row"><!-- Row -->

                        <div class="input-field col s6">
                            <input id="email" type="email" class="validate" name="email" autocomplete="off">
                            <label for="email">Email corporativo</label>
                            <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                            <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="animated fadeIn" data-error="wrong" data-success="right"><?php echo e($errors->first('email')); ?></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                        <div class="input-field col s6">
                          <input id="email_personal" type="text" class="validate" name="email_personal" autocomplete="off">
                          <label for="email_personal">Email personal</label>
                          <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                          <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->get('email_personal'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="animated fadeIn" data-error="wrong" data-success="right"><?php echo e($errors->first('email_personal')); ?></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                      </div><!-- Row -->

                      <div class="row"><!-- Row -->

                        <div class="input-field col s4">
                            <input id="telefono_celular" type="number" class="validate" name="telefono_celular" autocomplete="off">
                            <label for="telefono_celular">Teléfono celular</label>
                            <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                            <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->get('telefono_celular'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="animated fadeIn" data-error="wrong" data-success="right"><?php echo e($errors->first('telefono_celular')); ?></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                        <div class="input-field col s4">
                          <input id="cuil" type="number" class="validate" name="cuil" autocomplete="off">
                          <label for="cuil">Cuil</label>
                          <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                          <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->get('cuil'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="animated fadeIn" data-error="wrong" data-success="right"><?php echo e($errors->first('cuil')); ?></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                        <div class="input-field col s4">
                          <input id="telefono_particular" type="number" class="validate" name="telefono_particular" autocomplete="off">
                          <label for="telefono_particular">Teléfono particular</label>
                          <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                          <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->get('telefono_particular'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="animated fadeIn" data-error="wrong" data-success="right"><?php echo e($errors->first('telefono_particular')); ?></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                      </div><!-- Row -->
                      <div class="row"><!-- Row -->
                    <?php if(3 == Auth::user()->rol_usuario): ?>
                        <div class="input-field col s4">
                            <input id="ip_maquina" type="text" class="validate" name="ip_maquina" autocomplete="off" pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$">
                            <label for="ip_maquina">Dirección IP de su PC</label>
                            <span class="helper-text" data-error="&#10006;" data-success="&#10004;">Completa sistemas</span>
                            <?php if($errors->any()): ?>
                            <?php $__currentLoopData = $errors->get('ip_maquina'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="animated fadeIn" data-error="wrong" data-success="right"><?php echo e($errors->first('ip_maquina')); ?></span>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </div>

                      <div class="input-field col s4">
                          <input id="dir_onedrive" type="url" class="validate" name="dir_onedrive" autocomplete="off">
                          <label for="dir_onedrive">Url de OneDrive</label>
                          <span class="helper-text" data-error="&#10006;" data-success="&#10004;">Completa sistemas</span>
                          <?php if($errors->any()): ?>
                          <?php $__currentLoopData = $errors->get('dir_onedrive'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <span class="animated fadeIn" data-error="wrong" data-success="right"><?php echo e($errors->first('dir_onedrive')); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </div>
                    <?php endif; ?>
                        <div class="input-field col s4">
                            <input id="interno" type="number" class="validate" name="interno" autocomplete="off">
                            <label for="interno">Interno</label>
                            <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                            <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->get('interno'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="animated fadeIn" data-error="wrong" data-success="right"><?php echo e($errors->first('interno')); ?></span>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                      </div><!-- Row -->
                      <div class="row"><!-- Row -->

                        <div class="file-field input-field col s4 offset-s5">
                          <input type="submit" class="btn grey hoverable center-align" value="Crear">
                        </div>

                      </div><!-- Row -->

                      <?php echo Form::close(); ?>

    </div><!-- Panel -->
    
</div><!-- Container -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('rrhh.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>