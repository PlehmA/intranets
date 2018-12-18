<?php $__env->startSection('css'); ?>
  <style>
    .page-header {
      height: 10vh;
    }

    a h6 {
      color: #737373;
    }
  
/* .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
    width: 153px;
    height: 185px;
    display: initial;
} */
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <?php if(Auth::check()): ?>

        <div class="container">
          <div class="page-header">
            <h3 class="text-center">Tutoriales</h3>
            <hr>
          </div>
          <div class="row">
              <div class="col-md-4 animated fadeIn"> 
                  <a href="<?php echo e(route('excel.index')); ?>">

                          <div class="center">
          
                            <img src="<?php echo e(asset('img/EXCEL/excel_icono.png')); ?>" alt="" class="img-responsive">
          
                          </div>
          
                        </a>
          </div> 

              <div class="col-md-4 animated fadeIn"> 
  
                <a href="<?php echo e(route('word.index')); ?>">
  
                  <div class="center">
                    <img src="<?php echo e(asset('img/WORD/word_icon.png')); ?>" alt="" class="img-responsive">
  
                  </div>
  
                </a>
  
              </div>
              
             
              <div class="col-md-4 animated fadeIn"> 
                  <a href="<?php echo e(url('/correotutos')); ?>">
                          
                          <div class="center">
                              
                              <img src="<?php echo e(asset('img/Correo.png')); ?>" alt="" class="img-responsive">
                              
                          </div>
                          
                      </a>
                  </div>
             
              
  
            </div> 
          <div class="row">

              <div class="col-md-4 animated fadeIn">
                  <a href="<?php echo e(route('onedrive.index')); ?>">

                          <div class="center">
          
                            <img src="<?php echo e(asset('img/onedrive/one_drive_icon.png')); ?>" alt="" class="img-responsive">
          
                          </div>
          
                        </a>
          </div>

          <div class="col-md-4 animated fadeIn">
              <a href="<?php echo e(route('officecalc.index')); ?>">

                <div class="center">
                  <img src="<?php echo e(asset('img/Calc.png')); ?>" alt="" class="img-responsive">

                </div>

              </a>
            </div>
            
            <div class="col-md-4 animated fadeIn">
              <a href="<?php echo e(route('officewriter.index')); ?>">

                <div class="center">
                  <img src="<?php echo e(asset('img/Writer.png')); ?>" alt="" class="img-responsive">
                </div>

              </a>
            </div>

          

          </div>

          <div class="row">

            <div class="col-md-4 animated fadeIn">

              <a href="<?php echo e(route('officebase.index')); ?>">

                <div class="center">
                  <img src="<?php echo e(asset('img/Base.png')); ?>" alt="" class="img-responsive">

                </div>

              </a>

            </div>
            <div class="col-md-4 animated fadeIn">
                <a href="<?php echo e(route('officeimpress.index')); ?>">
  
                  <div class="center">
                    <img src="<?php echo e(asset('img/Impress.png')); ?>" alt="" class="img-responsive">
  
                  </div>
  
                </a>
              </div>
 

          </div>
       
        </div>

  <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('tutos.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>