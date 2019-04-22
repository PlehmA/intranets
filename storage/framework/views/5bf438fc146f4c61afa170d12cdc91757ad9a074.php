
<?php $__env->startSection('css'); ?>
<style>
    .main-panel {
        overflow: auto;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 9991;
        padding-top: 0;
        left: 0;
        top: 0;
        width: 50%;
        overflow: auto;
        background-color: transparent;
        box-shadow: none;

    }

    .modal-overlay {
        opacity: 0.1 !important;
    }

    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes  animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        background-color: #f7f7f7;
        color: #222222;
    }

    .modal-body {
        padding: 2px 16px;
    }

    .modal .modal-header .close {
        color: #222222;
    }

    #contenidoEvent p {
        font-size: 18px;
    }
.center-block {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.thumbnail{
    width: 50px;
    height: 50px;
    margin-bottom: 0 !important;
}
</style>
<?php echo toastr_css(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
    <div class="col-sm-12 col-md-8 col-lg-5">

        <?php if(session('status')): ?>
        <div class="alert">
            <?php echo e(session('status')); ?>

        </div>
        <?php endif; ?>

        <table class="table responsive-table" id="area" data-page-length='3'>
            <thead>
                <tr>
                    <th><b>ID</b></th>
                    <th><b>Área</b></th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td scope="row"><?php echo e($puesto->id); ?></td>
                    <td><?php echo e($puesto->nombre_puesto); ?></td>
                    <td>
                        <form action="<?php echo e(route('puesto.show', $puesto->id)); ?>" method="get">
                            <button type="submit" data-id="<?php echo e($puesto->id); ?>" data-puesto="<?php echo e($puesto->nombre_puesto); ?>"
                                data-target="modalEdit" class="btn blue modal-trigger btn-edit"><i
                                    class="fas fa-edit"></i>
                            </button>
                        </form>

                    </td>
                    <td>
                        <?php echo Form::open(['route' => ['puesto.destroy', $puesto->id], 'method' => 'delete']); ?>

                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn red lighten-2 btn-delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        <?php echo Form::close(); ?>


                    </td>
                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-5 col-lg-offset-1">
        <div class="panel panel-warning" style="margin-top: 100px;">
            <div class="panel-heading">
                    <h3 class="panel-title">Nueva área</h3>
            </div>
            <div class="panel-body">

                <?php echo Form::open(['route' => 'puesto.store', 'method' => 'post']); ?>

                <?php echo csrf_field(); ?>
                    <div class="input-field col-sm-12 col-md-8 col-md-offset-2">
                            <i class="material-icons prefix">playlist_add</i><input type="text" name="nombre_puesto">
                    </div>
                    <div class="col-sm-12 col-md-12">

                        <span class="input-group-btn center-block">
                            <button class="btn grey" type="submit" style="margin-top: 35px;">Crear</button>
                        </span>

                    </div>
                
                <?php echo Form::close(); ?>



            </div>
        </div>

        <?php if(session('success')): ?>
        <div class="alert brown lighten-4 animated fadeIn text-center">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
        <div class="alert red lighten-3 animated fadeIn text-center">
            <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>

</div>
</div>

<div class="row">
        <div class="col-sm-12 col-md-5 col-lg-5" style="margin-top: 20px">
            <table class="table responsive-table" id="education" data-page-length='3'>
                    <thead>
                            <tr>
                                <th><b>ID</b></th>
                                <th><b>Nombre</b></th>
                                <th><b>Imagen</b></th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tutoriales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutorial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                            <tr>
                                <td scope="row"><?php echo e($tutorial->id); ?></td>
                                <td><?php echo e($tutorial->name); ?></td>
                                <td><img src="<?php echo e(asset('storage/'.$tutorial->image)); ?>" class="thumbnail"></td>
                                <td>
                                    <form action="<?php echo e(route('tutoriales/show', $tutorial->id)); ?>" method="get">
                                        <button type="submit" class="btn blue modal-trigger btn-edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                        <?php echo Form::open(['route' => ['tutoriales/delete', $tutorial->id], 'method' => 'delete']); ?>

                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn red lighten-2">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <?php echo Form::close(); ?>

                                </td>
                            </tr>
            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
            </table>
            </div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-lg-offset-1" style="margin-top: 40px">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">Creacion de tutoriales</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                
                                        <?php echo Form::open(['route' => 'tutoriales/subida', 'files' => true, 'method' => 'PUT']); ?>

                                            <?php echo csrf_field(); ?>
                                            
                                            <div class="input-field col-sm-12 col-md-8 col-md-offset-2">
                                                    <i class="material-icons prefix">playlist_add</i><input type="text" name="nombreTuto">
                                            </div>
                                            <div class="col-sm-12 col-md-8 col-md-offset-2">

                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>Imagen</span>
                                                    <input type="file" name="imgPortada">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                            </div>
                        
                                            <span class="input-group-btn center-block">
                                                <button class="btn grey" type="submit" style="margin-top: 35px;">Crear</button>
                                            </span>
                        
                                            </div>
                
                                        <?php echo Form::close(); ?>

                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
   
<div class="row">
        <div class="col-sm-12 col-md-5 col-lg-5" style="margin-top: 40px">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Subida de videos</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
        
                                <?php echo Form::open(['route' => 'videos/store', 'files' => true, 'method' => 'POST']); ?>

                                    <?php echo csrf_field(); ?>
                              
                                    <div class="input-field col-sm-12 col-md-12">
                                            <select class="icons">
                                                    <option value="" disabled selected>Seleccione tutorial</option>
                                                <?php $__currentLoopData = $tutoriales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vids): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vids->id); ?>" data-icon="<?php echo e(asset('storage/'.$vids->image)); ?>"><?php echo e($vids->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <label>Tutorial a cual añadir videos</label>
                                    </div>

                                    <div class="input-field col-sm-12 col-md-12">
                                            <i class="material-icons prefix">video_library</i>
                                            <input id="icon_prefix" type="text">
                                            <label for="icon_prefix" style="margin-left: 4rem;">Título del video</label>
                                          </div>
                                    
                                    <div class="file-field input-field col-sm-12 col-md-12">
                                            <div class="btn">
                                                <span><i class="material-icons">ondemand_video</i></span>
                                                <input type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    <div class="col-sm-12 col-md-4 col-md-offset-3 col-lg-4 col-lg-offset-4">
                                        <button class="btn grey" type="submit">Cargar video</button>
                                    </div>

                                <?php echo Form::close(); ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>    
</div>   
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<?php echo toastr_js(); ?>
<?php echo app('toastr')->render(); ?>
<script>
    $(document).ready(function () {
        $('select').formSelect();
    });
</script>
<script>
    $(document).ready(function () {
        $('#area').DataTable({
            "dom": 'frtip'
        });
        $('#education').DataTable({
            "dom": 'frtip'
        });
    });
</script>
<script>
$(".alert").click(function (e) { 
        e.preventDefault();
$(".alert").hide();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>