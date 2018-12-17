<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Uitalk</title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body>
<style>
* {
  font-family: 'Roboto', sans-serif;
}
    body {
      background: url(<?php echo e(url('/img/logueoproporcionado.png')); ?>) no-repeat;
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-color: #66999;
    }
    .tarj-login {
      margin-top: 30%;
      margin-left: 25%;
    }
    .botoncito {
      background: url(<?php echo e(url('img/botoningreso.png')); ?>);
      background-size: 140px 40px;
    }
    .btn {
      width: 140px;
      height: 40px;
    }
</style>
<div id="app">
    <div class="container">
        <div class="col-md-6 tarj-login">
            <div class="card card-header">
                Acceso
            </div>
            <div class="card card-header">
              <?php if(session('errorses')): ?>
                  <div class="container alert alert-warning text-center" role="alert" data-dismiss="alert">
                      <?php echo e(session('errorses')); ?>

                  </div>
              <?php endif; ?>
                <form action="<?php echo e(route('login')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group mx-auto text-center" <?php echo e($errors->has('email') ? 'has-error' : ''); ?>>
                        <input type="text" name="username" id="username" placeholder="Nombre de Usuario" value="<?php echo e(old('username')); ?>" class="form-control" required>
                    </div>
                        <?php echo $errors->first('username', '<span class="help-block">:message</span>'); ?>

                    <div class="form-group mx-auto text-center" <?php echo e($errors->has('password') ? 'has-error' : ''); ?>>
                        <input type="password" name="password" id="password" placeholder="Contraseña" class="form-control" required>
                    </div>
                    <?php echo $errors->first('password', '<span class="help-block">:message</span>'); ?>

                    <div class="form-group mx-auto text-center">
                        <input type="submit" class="btn botoncito" name="submit" value="">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
