@extends('layouts.app')
@section('css')
<style>

@media only screen and (min-width: 1400px){
    .col.s12 {
    width: 66.6666666667%;
    margin-left: auto;
    left: auto;
    right: auto;
}
}
@media only screen and (min-width:700px){
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
</style>
@endsection
@section('content')
<main id="app">
<div class="container-fluid">
<div class="row">
        <div class="col s4">
                <ul class="collection">
                        <li class="collection-item"><p><label><input name="opcionauto" type="radio" :value="1" v-model="formu" /><span>Por matrimonio</span></label></p></li>
                        <li class="collection-item"><p><label><input name="opcionauto" type="radio" :value="2" v-model="formu" /><span>Por nacimiento de hijo/s</span></label></p></li>
                        <li class="collection-item"><p><label><input name="opcionauto" type="radio" :value="3" v-model="formu" /><span>Por nacimiento de hijo</span></label></p></li>
                        <li class="collection-item"><p><label><input name="opcionauto" type="radio" :value="4" v-model="formu" /><span>Por mudanza</span></label></p></li>
                        <li class="collection-item"><p><label><input name="opcionauto" type="radio" :value="5" v-model="formu" /><span>Permiso por enfermedad del familiar</span></label></p></li>
                        <li class="collection-item"><p><label><input name="opcionauto" type="radio" :value="6" v-model="formu" /><span>Permiso por exámen</span></label></p></li>
                        <li class="collection-item"><p><label><input name="opcionauto" type="radio" :value="7" v-model="formu" /><span>Permiso de estudio</span></label></p></li>
                        <li class="collection-item"><p><label><input name="opcionauto" type="radio" :value="8" v-model="formu" /><span>Por asuntos judiciales y/o gremiales</span></label></p></li>
                        <li class="collection-item"><p><label><input name="opcionauto" type="radio" :value="9" v-model="formu" /><span>Otros</span></label></p></li>
                </ul>
            </div>
        <div class="col s8">
                <h3 class="center-align" style="margin-top: 0px;">Gestiones</h3>
        </div>
            {!! Form::open(['route' => 'autorizaciones.store', 'method', 'POST']) !!}
                   
                            @if (session('success'))
                                <div class="alert alert-success grey lighten-2 center-align" style="color: black;">
                                    <b>{{ session('success') }}</b>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger center-align">
                                        <b>{{ session('error') }}</b>
                                </div>
                            @endif
                        <!-- SEPARACION -->
                        <main  v-if="formu == 1">
        
                                
        
                                    <div class="row">
                                            <div class="col m6 offset-m1">
                                              <div class="card">
                                                <div class="card-content white-text">
                                                  <span class="card-title" style="color: black">Licencia por matrimonio</span>
                                                  <hr>
                                                  <label>De: </label> <br> <input type="date" style="color: black" class="browser-default" value="{{ date('Y-m-d') }}" name="dematrimonio">
                                                  <br>
                                                  <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="{{ date('Y-m-d') }}" name="hastamatrimonio">
                                                </div>
                                                <div class="card-action">
                                                        <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                                                  
                                                </div>
                                              </div>
                                        </div>
                                    </div>     
        
                        </main>
                        <!-- SEPARACION -->
                        <main v-else-if="formu == 2">
        
                                
        
                                        <div class="row">
                                                <div class="col m6 offset-m1">
                                                  <div class="card">
                                                    <div class="card-content white-text">
                                                      <span class="card-title" style="color: black">Licencia por nacimiento de hijo</span>
                                                      <hr>
                                                      <label>De: </label> <br> <input type="date" style="color: black" class="browser-default" value="{{ date('Y-m-d') }}" name="dehijos">
                                                      <br>
                                                      <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="{{ date('Y-m-d') }}" name="hastahijos">
                                                    </div>
                                                    <div class="card-action">
                                                            <button class="btn grey hoverable btn-small" >Enviar pedido</button>
                                                      
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>     
                              
                        </main>
                        <!-- SEPARACION -->
                        <main v-else-if="formu == 3">
                                
                                <div class="row">
                                        <div class="col m6 offset-m1">
                                          <div class="card">
                                            <div class="card-content white-text">
                                              <span class="card-title" style="color: black">Licencia por casamiento de hijo/s</span>
                                              <hr>
                                              <label>De: </label> <br> <input type="date" style="color: black" class="browser-default" value="{{ date('Y-m-d') }}" name="decasahijos">
                                              <br>
                                              <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="{{ date('Y-m-d') }}" name="hastacasahijos">
                                            </div>
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
                                                                <label>De: </label> <input type="date" name="demudanza" value="{{ date('Y-m-d') }}" class="browser-default">
                                                             </div>
                                                             <div class="col s5">
                                                                <label>Hasta: </label> <input type="date" name="hastamudanza" value="{{ date('Y-m-d') }}" class="browser-default">
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
                                              <span class="card-title" style="color: black">Licencia por enfermedad del familiar</span>
                                              <hr>
                                              <label>De: </label> <br> <input type="date" style="color: black" class="browser-default" value="{{ date('Y-m-d') }}" name="deenffamiliar">
                                              <br>
                                              <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="{{ date('Y-m-d') }}" name="hastaenffamiliar">
                                            </div>
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
                                              <label>De: </label> <br> <input type="date" style="color: black" class="browser-default" value="{{ date('Y-m-d') }}" name="delicexamen">
                                              <br>
                                              <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="{{ date('Y-m-d') }}" name="hastalicexamen">
                                            </div>
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
                                              <span class="card-title" style="color: black">Permiso de estudio</span>
                                              <hr>
                                              <label>De: </label> <br> <input type="date" style="color: black" class="browser-default" value="{{ date('Y-m-d') }}" name="depemestudio">
                                              <br>
                                              <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="{{ date('Y-m-d') }}" name="hastapemestudio">
                                            </div>
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
                                              <span class="card-title" style="color: black">Por asuntos judiciales y/o gremiales</span>
                                              <hr>
                                              <label>De: </label> <br> <input type="date" style="color: black" class="browser-default" value="{{ date('Y-m-d') }}" name="delicjuzcom">
                                              <br>
                                              <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="{{ date('Y-m-d') }}" name="hastalicjuzcom">
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
                                              <span class="card-title" style="color: black">Otros</span>
                                              <hr>
                                              <label>De: </label> <br> <input type="date" style="color: black" class="browser-default" value="{{ date('Y-m-d') }}" name="delicjuzcom">
                                              <br>
                                              <label>Hasta: </label> <br> <input type="date" class="browser-default" style="color: black" value="{{ date('Y-m-d') }}" name="hastalicjuzcom">
                                              <br>
                                              <label>Motivo: </label> <br> <textarea style="color: black" rows="1400" cols="1400" name="motivo"></textarea>
                                            </div>
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
        
                {!! Form::close() !!}
            
</div>
   
</div>
</main>



@endsection 
@section('javascript')
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
@endsection