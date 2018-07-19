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

</style>
@endsection 
@section('content')
<div class="container">
    <div class="row">

        <div class="col s3 plantillas">
            <img src="{{ asset('images/plantillas/1.jpg') }}" alt="asd" class="materialboxed z-depth-2">
            <br>
            <a href="">Descargar plantilla</a>
        </div>

        <div class="col s3 plantillas">
            <img src="{{ asset('images/plantillas/2.jpg') }}" alt="asd" class="materialboxed z-depth-2">
            <br>
            <a href="">Descargar plantilla</a>
        </div>

        <div class="col s3 plantillas">
            <img src="{{ asset('images/plantillas/3.jpg') }}" alt="asd" class="materialboxed z-depth-2">
            <br>
            <a href="">Descargar plantilla</a>
        </div>

        <div class="col s3 plantillas">
            <img src="{{ asset('images/plantillas/4.jpg') }}" alt="asd" class="materialboxed z-depth-2">
            <br>
            <a href="">Descargar plantilla</a>
        </div>

    </div>
<div class="row">
        <div class="col s3 plantillas">
            <img src="{{ asset('images/plantillas/5.jpg') }}" alt="asd" class="materialboxed z-depth-2">
            <br>
            <a href="">Descargar plantilla</a>
        </div>
</div>
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
    });
</script>
@endsection 