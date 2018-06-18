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
                      <div class="input-field offset-s2 col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="newPass" type="password" class="validate" name="newPass" required>

                      </div>
                      <div class="input-field col s4">

                        <button id="btnpass" class="btn grey" form="formulario">Cambiar contraseña</button>

                      </div>
                    </div>
                  </div>
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

      $('#alert').show();
      $.ajax({
        url: '{{ action('ConfigController@update') }}',
        type: 'POST',
        data: data
      })
      .done(function(result) {
        $('#alert').html(result.success);
      })
      .fail(function() {
        console.log("error");
      });


      });
  });
</script>
    @endsection
