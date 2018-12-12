@extends('rrhh.app')
@section('css')
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
@endsection
@section('content')


<div class="container"><!-- Container -->
    
    <div class="panel"><!-- Panel -->
        @if (session('success'))
        <div class="container alert alert-success text-center" role="alert" data-dismiss="alert">
            {{ session('success') }}
        </div>
        @endif

    
          {!! Form::open(['method' => 'POST', 'route' => 'addpers.store', 'class' => 'form-horizontal']) !!}
                  @csrf
                      <div class="row"><!-- Row -->
                        
                        <div class="input-field col s6">
                            <input id="name" type="text" class="validate" name="name" autocomplete="off" required>
                            <label for="name">Nombre y Apellido</label>
                            @if ($errors->any())
                                @foreach ($errors->get('name') as $error)
                                <span class="animated fadeIn" data-error="wrong">{{ $errors->first('name') }}</span>
                              @endforeach
                            @endif
                        </div>

                        <div class="input-field col s6">
                          <input id="username" type="text" class="validate" name="username" autocomplete="off" required>
                          <label for="username">Nombre de usuario</label>
                              <span class="helper-text">Primera letra de los nombres y el apellido completo. Ej: cmtuozzo</span>
 
                          @if ($errors->any())
                                @foreach ($errors->get('username') as $error)
                                <span class="animated fadeIn" data-error="wrong" data-success="right">{{ $errors->first('username') }}</span>
                              @endforeach
                            @endif
                        </div>
                        
                      </div><!-- Row -->
                      <div class="row"><!-- Row -->

                       <div class="input-field col s4">
                        
                        <select class="browser-default" name="rol_usuario" required>
                          <option value="" disabled selected>Elegir sector...</option>
                          @foreach($puesto as $puestos)
                        <option value="{{ $puestos->id }}">{{ $puestos->nombre_puesto }}</option>
                          @endforeach
                        </select>
                        @if ($errors->any())
                                @foreach ($errors->get('rol_usuario') as $error)
                                <span class="animated fadeIn" data-error="wrong" data-success="right">{{ $errors->first('rol_usuario') }}</span>
                              @endforeach
                            @endif
                       </div>

                        <div class="input-field col s4">
                          <input id="num_legajo" type="number" class="validate" name="num_legajo" autocomplete="off" required>
                          <label for="num_legajo">Número de legajo</label>
                          <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                          @if ($errors->any())
                                @foreach ($errors->get('num_legajo') as $error)
                                <span class="animated fadeIn" data-error="wrong" data-success="right">{{ $errors->first('num_legajo') }}</span>
                              @endforeach
                            @endif
                        </div>

                        <div class="input-field col s4">
                          <input id="fecha_nacimiento" type="date" class="validate" name="fecha_nacimiento" autocomplete="off">
                          <label for="fecha_nacimiento">Fecha de nacimiento</label>
                          <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                          @if ($errors->any())
                                @foreach ($errors->get('fecha_nacimiento') as $error)
                                <span class="animated fadeIn" data-error="wrong" data-success="right">{{ $errors->first('fecha_nacimiento') }}</span>
                              @endforeach
                            @endif
                        </div>

                      </div><!-- Row -->

                      <div class="row"><!-- Row -->

                        <div class="input-field col s6">
                            <input id="email" type="email" class="validate" name="email" autocomplete="off">
                            <label for="email">Email corporativo</label>
                            <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                            @if ($errors->any())
                                @foreach ($errors->get('email') as $error)
                                <span class="animated fadeIn" data-error="wrong" data-success="right">{{ $errors->first('email') }}</span>
                              @endforeach
                            @endif
                        </div>

                        <div class="input-field col s6">
                          <input id="email_personal" type="text" class="validate" name="email_personal" autocomplete="off">
                          <label for="email_personal">Email personal</label>
                          <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                          @if ($errors->any())
                                @foreach ($errors->get('email_personal') as $error)
                                <span class="animated fadeIn" data-error="wrong" data-success="right">{{ $errors->first('email_personal') }}</span>
                              @endforeach
                            @endif
                        </div>

                      </div><!-- Row -->

                      <div class="row"><!-- Row -->

                        <div class="input-field col s4">
                            <input id="telefono_celular" type="number" class="validate" name="telefono_celular" autocomplete="off">
                            <label for="telefono_celular">Teléfono celular</label>
                            <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                            @if ($errors->any())
                                @foreach ($errors->get('telefono_celular') as $error)
                                <span class="animated fadeIn" data-error="wrong" data-success="right">{{ $errors->first('telefono_celular') }}</span>
                              @endforeach
                            @endif
                        </div>

                        <div class="input-field col s4">
                          <input id="cuil" type="number" class="validate" name="cuil" autocomplete="off">
                          <label for="cuil">Cuil</label>
                          <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                          @if ($errors->any())
                                @foreach ($errors->get('cuil') as $error)
                                <span class="animated fadeIn" data-error="wrong" data-success="right">{{ $errors->first('cuil') }}</span>
                              @endforeach
                            @endif
                        </div>

                        <div class="input-field col s4">
                          <input id="telefono_particular" type="number" class="validate" name="telefono_particular" autocomplete="off">
                          <label for="telefono_particular">Teléfono particular</label>
                          <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                          @if ($errors->any())
                                @foreach ($errors->get('telefono_particular') as $error)
                                <span class="animated fadeIn" data-error="wrong" data-success="right">{{ $errors->first('telefono_particular') }}</span>
                              @endforeach
                            @endif
                        </div>

                      </div><!-- Row -->
                      <div class="row"><!-- Row -->
                    @if(3 == Auth::user()->rol_usuario)
                        <div class="input-field col s4">
                            <input id="ip_maquina" type="text" class="validate" name="ip_maquina" autocomplete="off" pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$">
                            <label for="ip_maquina">Dirección IP de su PC</label>
                            <span class="helper-text" data-error="&#10006;" data-success="&#10004;">Completa sistemas</span>
                            @if ($errors->any())
                            @foreach ($errors->get('ip_maquina') as $error)
                            <span class="animated fadeIn" data-error="wrong" data-success="right">{{ $errors->first('ip_maquina') }}</span>
                          @endforeach
                        @endif
                      </div>

                      <div class="input-field col s4">
                          <input id="dir_onedrive" type="url" class="validate" name="dir_onedrive" autocomplete="off">
                          <label for="dir_onedrive">Url de OneDrive</label>
                          <span class="helper-text" data-error="&#10006;" data-success="&#10004;">Completa sistemas</span>
                          @if ($errors->any())
                          @foreach ($errors->get('dir_onedrive') as $error)
                          <span class="animated fadeIn" data-error="wrong" data-success="right">{{ $errors->first('dir_onedrive') }}</span>
                        @endforeach
                      @endif
                    </div>
                    @endif
                        <div class="input-field col s4">
                            <input id="interno" type="number" class="validate" name="interno" autocomplete="off">
                            <label for="interno">Interno</label>
                            <span class="helper-text" data-error="&#10006;" data-success="&#10004;"></span>
                            @if ($errors->any())
                                @foreach ($errors->get('interno') as $error)
                                <span class="animated fadeIn" data-error="wrong" data-success="right">{{ $errors->first('interno') }}</span>
                              @endforeach
                            @endif
                        </div>

                      </div><!-- Row -->
                      <div class="row"><!-- Row -->

                        <div class="file-field input-field col s4 offset-s5">
                          <input type="submit" class="btn grey hoverable center-align" value="Crear">
                        </div>

                      </div><!-- Row -->

                      {!! Form::close() !!}
    </div><!-- Panel -->
    
</div><!-- Container -->

@endsection