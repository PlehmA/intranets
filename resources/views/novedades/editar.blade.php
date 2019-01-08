@extends('layouts.app') @section('css')
<style>
        .titulo {
                margin-top: 0px;
        }
        textarea{
            width: initial;
            height: initial;
            background-color: whitesmoke;
        }
        .content{
            margin-top: 7vh;
        }
        .alert{
                background-color: lightgrey;
                border: 1px;
                border-color: black;
        }
        .main-panel{
    overflow: auto;
}
</style>
@endsection 
@section('content')
<div class="container">
        <div class="row titulo">
                <h3 class="center-align">Editar entrada N°: {{ $news->id }}</h3>
        </div>
        @if (session('success'))
                <div class="alert animated fadeIn center align">
                {{ session('success') }}
                </div>
        @endif
        <div class="row">
                {!! Form::open(['method' => 'PUT', 'id' => 'formulariox', 'enctype' => 'multipart/form-data', 'route'
                => ['noticia.update', $news->id]]) !!}
                {{ csrf_field() }}
                <div class="row">
                        <div class="input-field col s12">
                                <input id="titulo" type="text" class="validate" name="titulo" autocomplete="off" value="{{ $news->titulo }}">
                                <label for="titulo">TÍTULO</label>

                        </div>
                </div>

                <div class="row">
                                <div class="input-field col s12">
                                        <input id="atajo" type="text" class="validate" name="atajo" autocomplete="off" value="{{ $news->atajo }}">
                                        <label for="atajo">Texto de previsualización</label>
        
                                        </div>
                        </div>

                <div class="row">
                        <div class="input-field col s12">
                                <textarea id="textarea" type="text" cols="175" rows="10" class="validate browser-default"
                                        name="cuerpo" autocomplete="off" value="{{ $news->cuerpo }}">
                                        {{ $news->cuerpo }}
                                </textarea>

                        </div>
                </div>
                <div class="row">
                        <div class="col s3">

                                <img src="{{ asset('storage/images/'.$news->foto) }}" alt="Imagen de noticia" class="responsive-img">

                        </div>

                        <div class="file-field input-field col s4" style="margin-top: 12vh;">
                                <div class="btn">
                                        <span>Imágen</span>
                                        <input type="file" name="foto">
                                </div>
                                <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" readonly>
                                </div>
                        </div>

                        <div class="col s2 offset-s1" style="margin-top: 12vh;">
                                <button type="submit" form="formulariox" class="btn grey hoverable"> editar</button>

                        </div>
                        <div class="col s2" style="margin-top: 12vh;">
                                <a href="{{ route('noticia.index')}}" class="btn red hoverable"> cancelar</a>

                        </div>

                </div>
                {!! Form::close() !!}
        </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset('tinymce\js\tinymce\tinymce.min.js') }}"></script>
<script>
        tinymce.init({
                selector: 'textarea',
                language: 'es',
                height: 400,
                images_upload_credentials: true,
                menubar: true,
                toolbar: 'fontsizeselect insert link image charmap print preview anchor textcolor pastetext spellchecker bold italic underline strikethrough styleselect fontselect  numlist bullist',
                fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
                plugins: [
                        'advlist autolink lists link image charmap print preview anchor textcolor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table contextmenu paste code help wordcount'
                ]
        });
</script>
<script>
$(document).ready(function () {
        $('.alert').click(function (e) { 
                e.preventDefault();
                $('.alert').addClass('fadeOut');
                setTimeout(() => {  $('.alert').hide(); }, 1000);
        });
});
</script>
@endsection