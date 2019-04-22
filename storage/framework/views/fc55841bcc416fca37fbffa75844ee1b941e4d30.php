<?php $__env->startSection('css'); ?>
<style>

@media  only screen and (min-width: 1400px){
    .col.s12 {
    width: 66.6666666667%;
    margin-left: auto;
    left: auto;
    right: auto;
}
}
@media  only screen and (min-width:700px){
    .col.s12 {
    width: 100%;
    margin-left: auto;
    left: auto;
    right: auto;
}
}
.content{
    margin-top: 12vh;
}
@media  only screen and (max-width: 1400px) {
    .card .card-content {
    padding: 24px;
    border-radius: 0 0 2px 2px;
}
.card .card-action {
    background-color: inherit;
    border-top: 1px solid rgba(160, 160, 160, 0.2);
    position: relative;
    padding: 16px 24px;
}

  }

.card .card-content {
    padding: 24px;
    height: initial;
    border-radius: 0 0 2px 2px;
}
[type="radio"]:not(:checked) + span, [type="radio"]:checked + span{
  color: gray;
}

.main-panel{
    overflow: auto;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main id="app">
<div class="container-fluid">
<div class="row">
        <?php echo Form::open(['route' => 'autorizaciones.store', 'method' => 'POST', 'class' => 'formulito']); ?>

        <div class="col s4">
                <ul class="collection">
                        <li class="collection-item"><p><label class="grey-text"><input class="text-grey" name="opcionauto" type="radio" :value="1" v-model="formu" /><span>Por matrimonio</span></label></p></li>
                        <li class="collection-item"><p><label class="grey-text"><input class="text-grey" name="opcionauto" type="radio" :value="3" v-model="formu" /><span>Por casamiento de hijo</span></label></p></li>
                        <li class="collection-item"><p><label class="grey-text"><input class="text-grey" name="opcionauto" type="radio" :value="4" v-model="formu" /><span>Por mudanza</span></label></p></li>
                        <li class="collection-item"><p><label class="grey-text"><input class="text-grey" name="opcionauto" type="radio" :value="5" v-model="formu" /><span>Por enfermedad de familiar directo</span></label></p></li>
                        <li class="collection-item"><p><label class="grey-text"><input class="text-grey" name="opcionauto" type="radio" :value="6" v-model="formu" /><span>Por exámen</span></label></p></li>
                        
                        
                        <li class="collection-item"><p><label class="grey-text"><input class="text-grey" name="opcionauto" type="radio" :value="9" v-model="formu" /><span>Por gestiones personales</span></label></p></li>
                        
                        
                        <li class="collection-item"><p><label class="grey-text"><input class="text-grey" name="opcionauto" type="radio" :value="13" v-model="formu" /><span>Por vacaciones</span></label></p></li>
              
                </ul>
            </div>
        <div class="col s8">
                <h3 class="center-align" style="margin-top: 0px;">Solicitud de licencia</h3>
                <?php if(session('success')): ?>
                <div class="alert alert-success grey lighten-2 center-align" style="color: black;">
                    <b><?php echo e(session('success')); ?></b>
                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert alert-danger center-align">
                        <b><?php echo e(session('error')); ?></b>
                </div>
            <?php endif; ?>
        </div>
                   
                         
                        <!-- SEPARACION -->
                        <main  v-if="formu == 1">
        
                                    <div class="row">
                                            <div class="col m6 offset-m1">
                                              <div class="card">
                                                <div class="card-content white-text">
                                                  <span class="card-title" style="color: black">Licencia por matrimonio</span>
                                                  <hr>
                                                  <label>Desde: </label> <br> <input type="date" style="color: black" class="browser-default" value="<?php echo e(date('Y-m-d')); ?>" name="dematrimonio">
                                                  <br>
                                                  <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="<?php echo e(date('Y-m-d')); ?>" name="hastamatrimonio">
                                                  <p style="color: black;display: inline-block;margin-left: 5px;">inclusive</p>
                                                </div>
                                                <p class="center-align" style="font-weight: 700;"><b><i> Esta licencia se deberá solicitar con 45 días de anticipación. La misma equivale a 15 días corridos.</i></b></p>
                                                <div class="card-action">
                                                        <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                                                  
                                                </div>
                                              </div>
                                        </div>
                                    </div>     
        
                        </main>
                        <!-- SEPARACION -->
      
                        <!-- SEPARACION -->
                        <main v-else-if="formu == 3">
                                
                                <div class="row">
                                        <div class="col m6 offset-m1">
                                          <div class="card">
                                            <div class="card-content white-text">
                                              <span class="card-title" style="color: black">Licencia por casamiento de hijo/s</span>
                                              <hr>
                                              <label>Desde: </label> <br> <input type="date" style="color: black" class="browser-default" value="<?php echo e(date('Y-m-d')); ?>" name="decasahijos">
                                              <br>
                                              <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="<?php echo e(date('Y-m-d')); ?>" name="hastacasahijos"><p style="color: black;display: inline-block;margin-left: 5px;">inclusive</p>
                                            </div>
                                            <p class="center-align" style="font-weight: 700;"><b><i> Esta licencia se deberá solicitar con un mes de anticipación. La misma equivale a 2 días corridos.</i></b></p>
                                            <div class="card-action">
                                                    <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>     
        
                        </main>
                        <!-- SEPARACION -->
                        <main v-else-if="formu == 4">
                                <div class="col s8">
                                        <div class="card horizontal">
                                          <div class="card-stacked">
                                            <div class="card-content">
                                                    <span class="card-title" style="color: black">Licencia por mudanza</span>
                                                    <hr>
                                                <div class="col">
                                                        <div class="col s5 offset-s1">
                                                                <label>Desde: </label> <input type="date" name="demudanza" value="<?php echo e(date('Y-m-d')); ?>" class="browser-default">
                                                             </div>
                                                             <div class="col s5" style="display: -webkit-box;">
                                                                <label>Hasta: </label> <input type="date" name="hastamudanza" value="<?php echo e(date('Y-m-d')); ?>" class="browser-default">
                                                                <p style="margin-top: 26px;margin-left: -14px">inclusive</p>
                                                             </div>
                                                             
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                            <div class="input-field col s5">
                                                                <input id="calle" name="calle" type="text" class="validate">
                                                                <label for="calle">Calle</label>
                                                            </div>
                                                            <div class="input-field col s2">
                                                                <input id="numero" name="numero" type="number" class="validate">
                                                                <label for="numero">Número</label>
                                                            </div>
                                                            <div class="input-field col s1">
                                                                    <input id="piso" name="piso" type="number" class="validate">
                                                                    <label for="piso">Piso</label>
                                                                </div>
                                                                <div class="input-field col s2">
                                                                        <input id="depto" name="depto" type="text" class="validate">
                                                                        <label for="depto">Depto.</label>
                                                                    </div>
                                                                    <div class="input-field col s2">
                                                                            <input id="cod_postal" name="cod_postal" type="number" class="validate">
                                                                            <label for="cod_postal">Cod.Post.</label>
                                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                            <div class="input-field col s6">
                                                                <input id="entrecalles" name="entrecalles" type="text" class="validate">
                                                                <label for="entrecalles">Entre Calles</label>
                                                            </div>
                                                            <div class="input-field col s6">
                                                                <input id="localidad" name="localidad" type="text" class="validate">
                                                                <label for="localidad">Localidad</label>
                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                            <div class="input-field col s6">
                                                                <input id="provincia" name="provincia" type="text" class="validate">
                                                                <label for="provincia">Provincia</label>
                                                            </div>
                                                            <div class="input-field col s6">
                                                                <input id="telefono" name="telefono" type="number" class="validate">
                                                                <label for="telefono">Teléfono</label>
                                                            </div>
                                                    </div>
                                                </div>
                                                   
                                            </div>
                                            <p class="center-align" style="font-weight: 700;"><b><i> Esta licencia se deberá solicitar con una semana de anticipación. La misma equivale a 2 días corridos.</i></b></p>
                                            <div class="card-action">
                                                    <div class="col s4 offset-s5">
                                                            <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                                                        </div>

                                                        
                                            </div>
                                          </div>
                                        </div>
                                  
                                    </div>
                        </main>
                        <!-- SEPARACION -->
                        <main v-else-if="formu == 5">
                                
                                <div class="row">
                                        <div class="col m6 offset-m1">
                                          <div class="card">
                                            <div class="card-content white-text">
                                              <span class="card-title" style="color: black">Licencia por enfermedad de familiar directo</span>
                                              <hr>
                                              <label>Desde: </label> <br> <input type="date" style="color: black" class="browser-default" value="<?php echo e(date('Y-m-d')); ?>" name="deenffamiliar">
                                              <br>
                                              <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="<?php echo e(date('Y-m-d')); ?>" name="hastaenffamiliar">
                                              <p style="color: black;display: inline-block;margin-left: 5px;">inclusive</p>
                                              <br>
                                              <label>Motivo: </label> <br> <textarea style="color: black" rows="1400" cols="1400" name="motivo"></textarea>
                                            </div>
                                            <p class="center-align" style="font-weight: 700;"><b><i> Se deberá traer certificado para constatar.</i></b></p>
                                            <div class="card-action">
                                                    <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
        
                        </main>
                        <!-- SEPARACION -->
                        <main v-else-if="formu == 6">
                                
                                <div class="row">
                                        <div class="col m6 offset-m1">
                                          <div class="card">
                                            <div class="card-content white-text">
                                              <span class="card-title" style="color: black">Licencia por exámen</span>
                                              <hr>
                                              <label>Desde: </label> <br> <input type="date" style="color: black" class="browser-default" value="<?php echo e(date('Y-m-d')); ?>" name="delicexamen">
                                              <br>
                                              <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="<?php echo e(date('Y-m-d')); ?>" name="hastalicexamen">
                                              <p style="color: black;display: inline-block;margin-left: 5px;">inclusive</p>
                                              <br>
                                              <br>
                                              <label>Materia: </label> 
                                              <input type="text"  style="color: black" name="materia">
                                            </div>
                                            <p class="center-align" style="font-weight: 700;"><b><i> Esta licencia se deberá solicitar con una semana de anticipación y equivale a dos días por examen. Se deberá traer certificado para constatar.</i></b></p>
                                            <div class="card-action">
                                                    <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                                              
                                            </div>

                                            
                                          </div>
                                        </div>
                                      </div>     
        
                            </main>
                        <!-- SEPARACION -->
                        <main v-else-if="formu == 7">
        
                                <div class="row">
                                        <div class="col m6 offset-m1">
                                          <div class="card">
                                            <div class="card-content white-text">
                                              <span class="card-title" style="color: black">Licencia por consulta médica</span>
                                              <hr>
                                              <label>Fecha: </label> <br> <input type="date" style="color: black" class="browser-default" value="<?php echo e(date('Y-m-d')); ?>" name="depemestudio">
                                              <br>
                                              <label>Horario: </label> <br> <input type="time" class="browser-default" style="color: black" value="<?php echo e(date('H:i:s')); ?>" name="hastapemestudio">
                                            </div>
                                            <p class="center-align" style="font-weight: 700;"><b><i> Esta licencia se deberá solicitar con una semana de anticipación.</i></b></p>
                                            <div class="card-action">
                                                    <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                                              
                                            </div>

                                            
                                          </div>
                                        </div>
                                      </div>     
        
                        </main>
                        <!-- SEPARACION -->
                        <main v-else-if="formu == 8">
        
                                <div class="row">
                                        <div class="col m6 offset-m1">
                                          <div class="card">
                                            <div class="card-content white-text">
                                              <span class="card-title" style="color: black">Licencia por asuntos judiciales</span>
                                              <hr>
                                              <label>Desde: </label> <br> <input type="date" style="color: black" class="browser-default" value="<?php echo e(date('Y-m-d')); ?>" name="delicjuzcom">
                                              <br>
                                              <label>Horario: </label> <br> <input type="time" class="browser-default" style="color: black" value="<?php echo e(date('H:i:s')); ?>" name="hastalicjuzcom">
                                            </div>
                                            <div class="card-action">
                                                    <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>
        
                        </main>

                    <main v-else-if="formu == 9">
        
                          <div class="row">
                                  <div class="col m6 offset-m1">
                                    <div class="card">
                                      <div class="card-content white-text">
                                        <span class="card-title" style="color: black">Por gestiones personales</span>
                                        <hr>
                                        <label>Desde: </label> <br> <input type="date" style="color: black" class="browser-default" value="<?php echo e(date('Y-m-d')); ?>" name="delicjuzcom">
                                        <br>
                                        <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="<?php echo e(date('Y-m-d')); ?>" name="hastalicjuzcom">
                                        <br>
                                        <label>Motivo: </label> <br> <textarea style="color: black" rows="1400" cols="1400" name="motivo" required></textarea>
                                      </div>
                                      <p class="center-align" style="font-weight: 700;"><b><i> Es obligatorio aclarar los motivos de la licencia. </i></b></p>

                                      <div class="card-action">
                                              <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                                        
                                      </div>

                                      
                                    </div>
                                  </div>
                                  
                                    
                                
                                </div>

                         
  
                    </main>

                    <main v-else-if="formu == 10">
        
                      <div class="row">
                              <div class="col m6 offset-m1">
                                <div class="card">
                                  <div class="card-content white-text">
                                    <span class="card-title" style="color: black">Licencia por visita médica</span>
                                    <hr>
                                    <label>Fecha: </label> <br> <input type="date" style="color: black" class="browser-default" value="<?php echo e(date('Y-m-d')); ?>" name="delicjuzcom">
                                    <br>
                                    <label>Horario: </label> <br> <input type="time" class="browser-default" style="color: black" value="<?php echo e(date('H:i:s')); ?>" name="hastalicjuzcom">
                                  </div>
                                  <p class="center-align" style="font-weight: 700;"><b><i> Esta licencia se deberá solicitar con 72 horas de anticipación.</i></b></p>
                                  <div class="card-action">
                                          <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>

                </main>

                
                    
            <main v-else-if="formu == 12">
        
              <div class="row">
                      <div class="col m6 offset-m1">
                        <div class="card">
                          <div class="card-content white-text">
                            <span class="card-title" style="color: black">Licencia por trámites personales</span>
                            <hr>
                            <label>Fecha: </label> <br> <input type="date" style="color: black" class="browser-default" value="<?php echo e(date('Y-m-d')); ?>" name="delicjuzcom">
                            <br>
                            <br> <input type="hidden" class="browser-default" style="color: black" value="<?php echo e(date('Y-m-d')); ?>" name="hastalicjuzcom">
                            
                            <br>
                            <label>Motivo: </label> <br> <textarea style="color: black" rows="1400" cols="1400" name="motivo"></textarea>
                          </div>
                          <p class="center-align" style="font-weight: 700;"><b><i> Esta licencia se deberá solicitar con 72 horas de anticipación.</i></b></p>
                          <div class="card-action">
                                  <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>

        </main>

        <main v-else-if="formu == 13">
        
          <div class="row">
                  <div class="col m6 offset-m1">
                    <div class="card">
                      <div class="card-content white-text">
                        <span class="card-title" style="color: black">Licencia por vacaciones</span>
                        <hr>
                        <label>Desde: </label> <br> <input type="date" style="color: black" class="browser-default" value="<?php echo e(date('Y-m-d')); ?>" name="delicjuzcom">
                        <br>
                        <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="<?php echo e(date('Y-m-d')); ?>" name="hastalicjuzcom">
                        <p style="color: black;display: inline-block;margin-left: 5px;">inclusive</p>
                      </div>
                      <p class="center-align" style="font-weight: 700;"><b><i>Esta licencia se deberá solicitar durante el mes de octubre.</i></b></p>
                      <div class="card-action">
                              <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                        
                      </div>

                      

                    </div>
                  </div>
                </div>

    </main>
                    
                        <main v-else-if="formu == 14">
        
                                <div class="row">
                                        <div class="col m6 offset-m1">
                                          <div class="card">
                                            <div class="card-content white-text">
                                              <span class="card-title" style="color: black">Otros</span>
                                              <hr>
                                              <label>Desde: </label> <br> <input type="date" style="color: black" class="browser-default" value="<?php echo e(date('Y-m-d')); ?>" name="delicjuzcom">
                                              <br>
                                              <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="<?php echo e(date('Y-m-d')); ?>" name="hastalicjuzcom">
                                              <p style="color: black;display: inline-block;margin-left: 5px;">inclusive</p>
                                              <br>
                                              <label>Motivo: </label> <br> <textarea style="color: black" rows="1400" cols="1400" name="motivo"></textarea>
                                            </div>
                                            
                                            <p class="center-align" style="font-weight: 700;"><b><i> Esta licencia se deberá solicitar con una semana de anticipación.</i></b></p>
                                            <div class="card-action">
                                                    <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                                              
                                            </div>

                                            
                                          </div>
                                        </div>
                                      </div>
        
                        </main>
                        <!-- SEPARACION -->
                        <main v-else></main>
                        <!-- SEPARACION -->
                    </div>
        
                <?php echo Form::close(); ?>

            
</div>
   
</div>
</main>



<?php $__env->stopSection(); ?> 
<?php $__env->startSection('javascript'); ?>
<script>
    const appli = new Vue({
        el: '#app',

        data: {
            formu: null,
            
        },
        methods: {
            
        }
    });
    $(document).ready(function () {
      
        $(".alert").click(function (e) { 
            e.preventDefault();
            $(".alert").fadeOut();            
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>