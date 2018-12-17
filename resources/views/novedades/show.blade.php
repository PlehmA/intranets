@extends('novedades.news') 
@section('css')
<style>

@media only screen and (max-width: 1400px){
.card .card-content {
    padding: 24px;
    border-radius: 0 0 2px 2px;
    min-height: 65vh;
}
}
}
#contenido{
  background-color: #FAFAFA;
}
</style>
@endsection 
@section('content')
<div class="container" id="contenido" style="background-color: #FAFAFA;margin-top: -45px;padding-top: 20px;padding-bottom: 30px; box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);">
     
        <div class="row">
                <div class="col l6 offset-l2">
                  <div class="card">
                    <div class="card-image">
                           
                    <span class="card-title">{{ $news->titulo }}</span>
                    </div> {{-- card-image --}}
                  </div>        {{-- card --}}
                </div>  {{-- col l10 offset-s1 --}}
              </div>    {{-- row --}}
              {!! $news->cuerpo !!}
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
                   toolbar: false
                       });
        </script>
@endsection