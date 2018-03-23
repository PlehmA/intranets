@extends('rrhh.app')

@section('content')

    <legend>Ingreso de Personal</legend>
<div class="panel">

    <form class="form-horizontal" enctype="multipart/form-data">

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

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="rol_usuario"></label>
                <div class="col-md-4">
                    <select id="rol_usuario" name="rol_usuario" class="form-control">
                        <option value="1">Presidencia</option>
                        <option value="2">Gerencia</option>
                        <option value="3">Sistemas</option>
                        <option value="4">Call-Center</option>
                        <option value="5">Recursos Humanos</option>
                        <option value="6">Auditoria</option>
                        <option value="7">Profesionales</option>
                        <option value="8">Desarrollo</option>
                        <option value="9">Administración</option>
                        <option value="10">Recepción</option>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="legajo"></label>
                <div class="col-md-4">
                    <input id="legajo" name="legajo" type="text" placeholder="Número de Legajo" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="fecha_ingreso"></label>
                <div class="col-md-4">
                    <input id="fecha_ingreso" name="fecha_ingreso" type="text" placeholder="Fecha de Ingreso" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="fecha_nacimiento"></label>
                <div class="col-md-4">
                    <input id="fecha_nacimiento" name="fecha_nacimiento" type="text" placeholder="Fecha de Nacimiento" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email"></label>
                <div class="col-md-4">
                    <input id="email" name="email" type="text" placeholder="Correo Corporativo" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email_personal"></label>
                <div class="col-md-4">
                    <input id="email_personal" name="email_personal" type="text" placeholder="Correo Personal" class="form-control input-md">

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
                <div class="panel-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="file" name="image" class="inputfile">
                </div>
            </div>


            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-8">
                    <button id="submit" name="submit" class="btn btn-success">Enviar</button>
                    <button id="reset" name="reset" class="btn btn-danger">Borrar</button>
                </div>
            </div>


    </form>
</div>

    @endsection