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
<div class="container">
    <div class="row">
        @foreach($plantillas as $plantilla)
        <div class="col s3 plantillas">
            <img src="{{ asset($plantilla->foto) }}" alt="asd" class="materialboxed z-depth-2" style="height: 15vh; margin-left: 4vh;">
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
</div>

@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
    });
</script>
@endsection 