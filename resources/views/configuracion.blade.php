@extends('layouts.app')
@section('content')
    @if(Auth::check())

    <div class="container">
        <div class="header">
            <h1 class="center animated fadeIn">Seguridad</h1>
        </div>
        <div class="form-group">

                <form method="POST" id="formulario">
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

                <button id="btnpass" class="btn grey" form="formulario">Cambiar</button>

              </div>
                </form>

        </div>
        <div id="alert" class="container alert alert-success text-center" role="alert" data-dismiss="alert" style="display: none; font-size: 16px;"></div>
    </div>

@endif
    @endsection
    @section('javascript')
<script>
  $(document).ready(function() {
    $('#formulario').submit(function(e) {
      e.preventDefault();
      if ( ! confirm('¿Desea cambiar la contraseña?')) {
        return false;
      }

      var form = $(this).parent('form');
      var data = form.serialize();

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $.ajax({
        url: '{{ action('ConfigController@update') }}',
        type: 'POST',
        data: data
      })
      .done(function(result) {
        console.log('success');
        // $('#alert').show();
        // $('#alert').html(result.success);
      })
      .fail(function(result) {
        console.log('error');
        // alert(result.error);
      });


      });

  });
</script>
    @endsection
