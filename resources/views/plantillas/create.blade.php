@extends('layouts.app') 
@section('css')
<style>
    .plantillas img {
        max-width: 10vh;
    }
    .plantillas a {
        margin-left: -1vh;
        line-height: 2;
    }
    .main-panel{
        height: calc(100% - 30px) !important;
    }
.content{
    margin-top: 12vh;
}
</style>
@endsection 
@section('content')
<div class="row">
    
    <div class="col-md-12">
        <h4 class="text-center">Carga de plantillas</h4>
    </div>
    <div class="col-md-12">
    <a href="{{ route('plantillas.index') }}" class="btn grey right">Volver</a>
    </div>
    
    <div class="row">
        
        <div class="col s12 xl4 offset-xl4">
            
                {!! Form::open(['method' => 'POST', 'route' => 'plantillas.store', 'enctype' => 'multipart/form-data']) !!}
                {{ csrf_field() }}
            <div class="input-field col s12">
                    <select name="rol_usuario">
                        @foreach ($puestos as $puesto)

                            <option value="{{ $puesto->id }}">{{ $puesto->nombre_puesto }}</option>
    
                        @endforeach
                    </select>
                    <label>Puesto</label>
                  </div>

                  <div class="file-field input-field">
                        <div class="btn grey">
                          <span>Foto</span>
                          <input type="file" name="foto">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text" readonly>
                        </div>
                      </div>

                    <div class="file-field input-field">
                            <div class="btn grey">
                              <span>Plantilla</span>
                              <input type="file" name="plantilla">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" readonly>
                            </div>
                    </div>

                    <div class="input-field">
                        <input id="titulo" type="text" name="titulo" class="validate">
                        <label for="titulo">Título</label>
                    </div>
                    
                    <button type="submit" class="btn grey right">Cargar</button>
                    {!! Form::close() !!}



                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- <a href="{{ url('/storage/plantillas/Mail Modelo Cheque Pendiente de retirar.docx') }}">probando documento</a> --}}

        </div>

        

    </div>
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
        $('select').formSelect();

    $('.alert').click(function (e) { 
        e.preventDefault();
        $('.alert').css('display', 'none');
    });
    });
</script>
@endsection 