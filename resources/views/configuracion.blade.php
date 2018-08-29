@extends('layouts.app')
@section('css')
<style>
    .content {
    margin-top: 5vh;
}
</style>
@endsection
@section('content')
    @if(Auth::check())

    <div class="container">
        <div class="header">
            <h1 class="center animated fadeIn">Seguridad</h1>
        </div>
        <div class="form-group">

          {!! Form::open(['route' => 'update', 'method' => 'PUT', 'id' => 'formulario']) !!}
                  {{ csrf_field() }}
                  <div class="row">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s5 offset-s3">
                        <i class="material-icons prefix">lock_outline</i>
                        <input id="verifyPass" type="password" class="validate" name="verifyPass" pattern="^[a-zA-Z0-9_.-]*$" required>
                        <label for="verifyPass">Contraseña actual</label>
                      </div>

                    </div>
                  </div>
                </div>
                  <div class="row">
                  <div class="col s12">
                    <div class="row">
                      <div class="input-field col s5 offset-s3">
                        <i class="material-icons prefix">lock_outline</i>
                        <input id="newPass" type="password" class="validate" pattern="^[a-zA-Z0-9_.-]*$" name="newPass" required>
                        <label for="newPass">Nueva contraseña</label>

                      </div>

                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s5 offset-s3">
                      <i class="material-icons prefix">lock_outline</i>
                      <input id="confirmPass" type="password" class="validate" pattern="^[a-zA-Z0-9_.-]*$" name="confirmPass" required>
                      <label for="confirmPass">Repetir contraseña</label>
                    </div>

                  </div>
                </div>
              </div>
              <div class="input-field center">

                <button type="submit" id="btnpass" class="btn btn-pass grey">Cambiar</button>

              </div>
              {!! Form::close() !!}

        </div>
        @if (session('success'))
            <div class="container alert alert-success text-center" role="alert" data-dismiss="alert">
                {{ session('success') }}
            </div>
        @endif
        <br>
        @if (session('error'))
            <div class="container alert alert-danger text-center" role="alert" data-dismiss="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>

@endif
    @endsection
    @section('javascript')
<script>
  $(document).ready(function() {

      $('#formulario').submit(function(event) {
        var pass1 = $("#newPass").val();
        var pass2 = $("#confirmPass").val();
        if (pass1 != pass2) {
            console.log("Las contraseñas no coinciden.");
            $("#newPass").css('borderColor', '#E34234');
            $("#confirmPass").css('borderColor', '#E34234');
        }
      });

  });
</script>
    @endsection
