<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('img/faviconuitalk.png')); ?>" />
  <link rel="icon" type="image/png" href="<?php echo e(asset('img/faviconuitalk.png')); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Uitalk</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name="viewport" content="width=device-width" />
  <!-- Bootstrap core CSS     -->
  <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" />
  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="<?php echo e(asset('css/demo.css')); ?>" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/correo.css')); ?>">
  <link rel='stylesheet' href='<?php echo e(asset('css/stylenew.css')); ?>' />
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.0/css/autoFill.dataTables.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
<style>
    body{
        background-color: #EEEEEE;
    }
    .content{
        padding: 5vh;
    }
</style>
<?php echo $__env->yieldContent('css'); ?>
<div class="wrapper">
  
        <div class="content">

                <?php echo $__env->yieldContent('content'); ?>

        </div>

</div>
<!--   Core JS Files   -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<!--  PerfectScrollbar Library -->
<script src="<?php echo e(asset('js/perfect-scrollbar.jquery.min.js')); ?>"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo e(asset('js/demo.js')); ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
<?php echo $__env->yieldContent('javascript'); ?>
</body>
</html>
