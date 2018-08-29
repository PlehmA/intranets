@extends('rrhh.app')

@section('content')


    
<div class="container">

    <div class="panel">
            <h5 style="margin-left: 1vh; margin-bottom: 2vh;">Editar datos del usuario</h5>
            @if (session('success'))
            <div class="container alert alert-success text-center animated fadeIn" role="alert" data-dismiss="alert">
                {{ session('success') }}
            </div>
            @endif
    
        
              {!! Form::open(['method' => 'PUT', 'route' => ['rrhh.update', $user->id], 'class' => 'form-horizontal']) !!}
                      @csrf
                          <div class="row"><!-- Row -->
                            
                            <div class="input-field col s6">
                            <input id="name" type="text" class="validate" name="name" autocomplete="off" required value="{{ $user->name }}">
                            <label for="name">Nombre y apellido</label>
                            </div>
    
                            <div class="input-field col s6">
                              <input id="username" type="text" class="validate" name="username" autocomplete="off" required value="{{ $user->username }}">
                              <label for="username">Nombre de usuario</label>
                    
                            </div>
                            
                          </div><!-- Row -->
                          <div class="row"><!-- Row -->
    
                           <div class="input-field col s4">
                            
                           <input id="puesto" type="text" class="validate" name="puesto" autocomplete="off" required value="{{ $user->puesto }}">
                           <label for="puesto">Área</label>
                           </div>
    
                            <div class="input-field col s4">
                              <input id="num_legajo" type="number" class="validate" name="num_legajo" autocomplete="off" required value="{{ $user->num_legajo }}">
                              <label for="num_legajo">Número de legajo</label>
                            </div>
    
                            <div class="input-field col s4">
                              <input id="fecha_nacimiento" type="date" class="validate" name="fecha_nacimiento" autocomplete="off" value="{{ $user->fecha_nacimiento }}">
                              <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            </div>
    
                          </div><!-- Row -->
    
                          <div class="row"><!-- Row -->
    
                            <div class="input-field col s6">
                                <input id="email" type="email" class="validate" name="email" autocomplete="off" value="{{ $user->email }}">
                                <label for="email">Email corporativo</label>
                            </div>
    
                            <div class="input-field col s6">
                              <input id="email_personal" type="text" class="validate" name="email_personal" autocomplete="off" value="{{ $user->email_personal }}">
                              <label for="email_personal">Email personal</label>

                            </div>
    
                          </div><!-- Row -->
    
                          <div class="row"><!-- Row -->
    
                            <div class="input-field col s4">
                                <input id="telefono_celular" type="number" class="validate" name="telefono_celular" autocomplete="off" value="{{ $user->telefono_celular }}">
                                <label for="telefono_celular">Teléfono celular</label>

                            </div>
    
                            <div class="input-field col s4">
                              <input id="cuil" type="number" class="validate" name="cuil" autocomplete="off" value="{{ $user->cuil }}">
                              <label for="cuil">Cuil</label>

                            </div>
    
                            <div class="input-field col s4">
                              <input id="telefono_particular" type="tel" class="validate" name="telefono_particular" autocomplete="off" value="{{ $user->telefono_particular }}">
                              <label for="telefono_particular">Teléfono particular</label>

                            </div>
    
                          </div><!-- Row -->
                          <div class="row"><!-- Row -->
    
                            <div class="input-field col s6">
                        <input id="ip_maquina" type="text" class="validate" name="ip_maquina" autocomplete="off" pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$" value="{{ $user->ip_maquina }}">
                        <label for="ip_maquina">Dirección IP de su PC</label>

                            </div>
    
                            <div class="input-field col s6">
                                <input id="interno" type="number" class="validate" name="interno" autocomplete="off"value="{{ $user->interno }}">
                                <label for="interno">Interno</label>

                            </div>
    
                          </div><!-- Row -->
                          <div class="row"><!-- Row -->
    
                            <div class="file-field input-field col s4 offset-s5">
                              <input type="submit" class="btn grey hoverable center-align" value="Actualizar">
                            </div>
    
                          </div><!-- Row -->
    
                          {!! Form::close() !!}
    </div>
</div>
@endsection
