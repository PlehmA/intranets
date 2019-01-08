@extends('layouts.app') 
@section('css')
    <style>
    .content{
        margin-top: 8vh;
    }
    .alert{
        background-color: lightgray;
    }
    select {
    display: initial;
}
.miniImagen{
    height: 7vh;
    width: 7vh;
}
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
    <a href="{{ route('files.index') }}" class="btn grey right">Volver</a>
    </div>
    <div class="row">
            <h4 class="center-align">Edición imágenes novedades</h4>
    </div>
 <div class="row">
        @if (session('success'))
        <div class="alert center-align">
            {{ session('success') }}
        </div>
    @endif
        {!! Form::open(['route' => ['files.update', $archivo->id], 'method' => 'PUT']) !!}
        <div class="input-field col-md-6">
                <input id="nombreurl" type="text" class="validate" name="nombreurl" value="{{ $archivo->nomImagen }}">
                <label for="nombreurl">Nombre</label>
              </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                        <button type="submit" class="btn grey">Editar</button>
                        {!! Form::close() !!}
                </div>
                {{-- <div class="col-md-6">
                        {!! Form::open(['route' => ['files.destroy', $archivo->id], 'method' => 'DELETE']) !!}
                        <button type="submit" class="btn grey">Borrar Imagen</button>
                      {!! Form::close() !!}
                </div> --}}
                
            </div>
             
        
 
</div>

@endsection
@section('javascript')
<script>
$(document).ready(function () {
    $('.alert').click(function (e) { 
        e.preventDefault();
        $('.alert').hide();
    });
});
</script>
@endsection