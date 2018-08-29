@extends('layouts.app')
@section('css')
<style>
        .fs14 b{
                font-size: 14px;
        }
        .fs20 b{
                font-size: 20px;
        }
        .content{
            margin-top: 7vh;
        }
</style>
@endsection 
@section('content')
<div class="container">
    <div class="row">
        <h3 class="center-align">Nueva noticia</h3>
    </div>
    <div class="row">
                @if (session('success'))
                        <div class="container">
                                <div class="animated fadeIn grey lighten-2 center-align fs14 alert-dismissible alert">
                                        <b>{{ session('success') }}</b>
                                        </div>
                        </div>                     
                @endif
            {!! Form::open(['method' => 'POST', 'route' => 'noticia.store', 'enctype' => 'multipart/form-data', 'id' => 'formulariox']) !!}
            {{ csrf_field() }}
            <div class="row">
                    <div class="input-field col s12">
                            <input id="titulo" type="text" class="validate" name="titulo" autocomplete="off">
                            <label for="titulo">TÍTULO</label>
            
                            </div>
            </div>
            
            <div class="row">
                    <div class="input-field col s12">
                            <textarea id="textarea" type="text" class="validate" name="cuerpo" autocomplete="off">
                                    
                            </textarea>
                            
                    </div>
            </div>
            <div class="row">
                    <div class="file-field input-field col s6">
                            <div class="btn">
                              <span>File</span>
                              <input type="file" name="foto" required>
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" readonly>
                            </div>
                          </div>

                    <div class="col s2 offset-s2">
                        <button type="submit" form="formulariox" class="btn grey hoverable"> crear</button>
                        
                    </div>
                    <a href="{{ route('noticia.index')}}" class="btn red hoverable"> cancelar</a>
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
           menubar: false,
           plugins: [
             'advlist autolink lists link image charmap print preview anchor textcolor',
             'searchreplace visualblocks code fullscreen',
             'insertdatetime media table contextmenu paste code help wordcount'
           ],
           toolbar: 'undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
               });
</script>
<script>
        $(document).ready(function () {
                $(".alert-dismissible").click(function (e) { 
                        e.preventDefault();
                        $(this).hide();
                });
        });
</script>
@endsection