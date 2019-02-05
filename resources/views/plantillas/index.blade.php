@extends('layouts.app') 
@section('css')
<style>
    .plantillas img {
        max-width: 10vw;
        height: 15vh;
        margin: 0 auto;
        text-align: center;
    }
    .plantillas a {
        display: block;
        text-align: center;
        color: grey;
    }
    .main-panel{
        overflow: auto;
    }
/* .content{
    margin-top: 10vh;
} */
</style>
@endsection
@section('content')

    @if (Auth::user()->rol_usuario==3)
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('plantillas.create') }}" class="btn grey right">Cargar plantilla</a>
        </div>    
    </div>
    
    @endif
    <div class="row">
        @foreach($plantillas as $plantilla)
        <div class="col s12 l2 xl2 plantillas">
            <img src="{{ asset($plantilla->foto) }}" alt="asd" class="materialboxed z-depth-2">
            <br>
        <a href="{{$plantilla->enlace}}" target="_blank">{{ $plantilla->titulo }}</a>
        </div>
@endforeach
    </div>
@if(0 == $plantillas->count())
    <div class="col s12">
        <h6 class="center-align"> No hay plantillas disponibles... <i class="far fa-sad-tear fa-2x"></i></h6>
    </div>
@endif


@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
    });
</script>
@endsection 