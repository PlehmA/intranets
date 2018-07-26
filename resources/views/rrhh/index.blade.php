@extends('rrhh.app') @section('content')


<div class="container"><!-- Container -->
    
    <div class="panel"><!-- Panel -->
        
        <h5 style="margin-left: 1vh;">Ingreso del personal</h5>
        @if (session('status1'))
        <div class="container alert alert-success text-center" role="alert" data-dismiss="alert">
            {{ session('status1') }}
        </div>
        @endif
        <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('rrhh.store') }}">
           
                      <div class="row"><!-- Row -->

                        <div class="input-field col s6">
                            <input id="name" type="text" class="validate" name="name" autocomplete="off">
                            <label for="name">Nombre y Apellido</label>
                            
                        </div>

                        <div class="input-field col s6">
                          <input id="username" type="text" class="validate" name="username" autocomplete="off">
                          <label for="username">Nombre de usuario</label>
                          <span class="helper-text" data-error="wrong" data-success="right">Primera letra de los nombres y el apellido completo. Ej: cmtuozzo</span>
                        </div>

                      </div><!-- Row -->
                      <div class="row"><!-- Row -->

                       <div class="input-field col s6">
                        
                        <select class="browser-default" required name="rol_usuario">
                          <option value="" disabled selected>Elegir sector...</option>
                          @foreach($puesto as $puestos)
                        <option value="{{ $puestos->id }}">{{ $puestos->nombre_puesto }}</option>
                          @endforeach
                        </select>
                       </div>

                        <div class="input-field col s6">
                          <input id="num_legajo" type="number" class="validate" name="num_legajo" autocomplete="off">
                          <label for="num_legajo">Número de legajo</label>
                          
                        </div>

                      </div><!-- Row -->
                      <div class="row"><!-- Row -->

                        <div class="input-field col s6">
                            <input id="fecha_ingreso" type="date" class="validate" name="fecha_ingreso" autocomplete="off">
                            <label for="fecha_ingreso">Fecha de ingreso</label>
                            
                        </div>

                        <div class="input-field col s6">
                          <input id="fecha_nacimiento" type="date" class="validate" name="fecha_nacimiento" autocomplete="off">
                          <label for="fecha_nacimiento">Fecha de nacimiento</label>
                          
                        </div>

                      </div><!-- Row -->
                      <div class="row"><!-- Row -->

                        <div class="input-field col s6">
                            <input id="email" type="email" class="validate" name="email" autocomplete="off">
                            <label for="email">Email corporativo</label>
                            
                        </div>

                        <div class="input-field col s6">
                          <input id="email_personal" type="text" class="validate" name="email_personal" autocomplete="off">
                          <label for="email_personal">Email personal</label>
                          
                        </div>

                      </div><!-- Row -->
                      <div class="row"><!-- Row -->

                        <div class="input-field col s6">
                            <input id="interno" type="number" class="validate" name="interno" autocomplete="off">
                            <label for="interno">Interno</label>
                            
                        </div>

                        <div class="input-field col s6">
                          <input id="telefono_particular" type="tel" class="validate" name="telefono_particular" autocomplete="off">
                          <label for="telefono_particular">Teléfono particular</label>
                          
                        </div>

                      </div><!-- Row -->
                      <div class="row"><!-- Row -->

                        <div class="input-field col s6">
                            <input id="telefono_celular" type="number" class="validate" name="telefono_celular" autocomplete="off">
                            <label for="telefono_celular">Teléfono celular</label>
                            
                        </div>

                        <div class="input-field col s6">
                          <input id="cuil" type="number" class="validate" name="cuil" autocomplete="off">
                          <label for="cuil">Cuil</label>
                          
                        </div>

                      </div><!-- Row -->
                      <div class="row"><!-- Row -->

                        <div class="input-field col s4">
                    <input id="ip_maquina" type="number" class="validate" name="ip_maquina" autocomplete="off" required pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$">
                    <label for="ip_maquina">Dirección IP de su PC</label>
                            
                        </div>

                        <div class="input-field col s4">
                            <input id="interno" type="number" class="validate" name="interno" autocomplete="off">
                            <label for="interno">Interno</label>
                            
                        </div>

                        <div class="file-field input-field col s4">
                                <div class="btn grey" style="margin-left: 10vh;">
                                  <span>Subir foto</span>
                                  <input type="file" name="foto">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="hidden">
                                </div>
                              </div>

                      </div><!-- Row -->

        </form>
    </div><!-- Panel -->
    
</div><!-- Container -->

@endsection