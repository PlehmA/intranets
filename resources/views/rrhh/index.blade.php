@extends('rrhh.app')

@section('content')


    <legend>Ingreso de Personal</legend>
<div class="panel">
    @if (session('status1'))
        <div class="container alert alert-success text-center" role="alert" data-dismiss="alert">
            {{ session('status1') }}
        </div>
    @endif
    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('ingpersonal') }}">

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name"></label>
                <div class="col-md-4">
                    <input id="name" name="name" type="text" placeholder="Nombre Completo" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="username"></label>
                <div class="col-md-4">
                    <input id="username" name="username" type="text" placeholder="Usuario" class="form-control input-md" required="">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="password"></label>
                <div class="col-md-4">
                    <input id="password" name="password" type="password" placeholder="Contraseña" class="form-control input-md" required="">

                </div>
            </div>
            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="rol_usuario"></label>
                <div class="col-md-4">
                    <select id="rol_usuario" name="rol_usuario" class="form-control">
                        <option value="1">Presidencia</option>
                        <option value="2">Gerencia</option>
                        <option value="3">Departamento de sistemas</option>
                        <option value="4">Call-center</option>
                        <option value="5">Recursos humanos</option>
                        <option value="6">Departamento de auditoria</option>
                        <option value="7">Departamento de profesionales</option>
                        <option value="8">Departamento de desarrollo</option>
                        <option value="9">Administración</option>
                        <option value="10">Recepción</option>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="legajo"></label>
                <div class="col-md-4">
                    <input id="legajo" name="legajo" type="number" placeholder="Número de Legajo" class="form-control input-md" required="">

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    <label class="control-label" for="fecha_ingreso">Fecha de Ingreso: </label>
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    <input id="fecha_ingreso" name="fecha_ingreso" type="date" placeholder="Fecha de Ingreso" class="form-control input-md">

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    <label class="control-label" for="fecha_ingreso">Fecha de Nacimiento: </label>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" placeholder="Fecha de Nacimiento" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email"></label>
                <div class="col-md-4">
                    <input id="email" name="email" type="email" placeholder="Correo Corporativo" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email_personal"></label>
                <div class="col-md-4">
                    <input id="email_personal" name="email_personal" type="email" placeholder="Correo Personal" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="ip_maquina"></label>
                <div class="col-md-4">
                    <input id="ip_maquina" name="ip_maquina" type="text" placeholder="Dirección de IP" class="form-control input-md" required="">
                    <span class="help-block">Completa Sistemas.</span>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="telefono_per"></label>
                <div class="col-md-4">
                    <input id="telefono_per" name="telefono_per" type="text" placeholder="Teléfono Personal" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="telefono_part"></label>
                <div class="col-md-4">
                    <input id="telefono_part" name="telefono_part" type="text" placeholder="Teléfono Particular" class="form-control input-md">

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    <label class="label label-placeholder">Foto:</label>
                    <hr>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="file" name="image">
                </div>
            </div>


            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Enviar">
                    <input type="reset" name="reset" class="btn btn-danger" value="Borrar">
                </div>
            </div>


    </form>
</div>

    @endsection
