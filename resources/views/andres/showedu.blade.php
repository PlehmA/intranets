@extends('layouts.app')
@section('css')
@toastr_css
@endsection
@section('content')
<div class="container">
<a href="{{ url('sistemas') }}" class="btn grey right">Volver</a>
    <div class="container">
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="panel-title">
                            ¿Desea actualizar datos de {{ $tutorial->name }}?
                        </div>
                    </div>
                    <div class="panel-body">
                            {!! Form::open(['route' => ['tutoriales/update', $tutorial->id], 'method' => 'put', 'files' => true]) !!}
            
            
                            <div class="input-field col-sm-12 col-md-10 col-md-offset-1">
                                    <i class="material-icons prefix">account_circle</i>
                                <input id="icon_prefix" type="text" name="nombreTuto" value="{{ $tutorial->name }}">
                                  </div>
                            
                                  <input type="hidden" name="imgName" value="{{ $tutorial->image }}">

                            <div class="file-field input-field col-sm-12 col-md-10 col-md-offset-1">
                                    <div class="btn">
                                      <span class="grey">Imagen</span>
                                      <input type="file" class="grey" name="newImage">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path" value="{{ $tutorial->image }}" type="text">
                                    </div>
                                  </div>

                            <div class="col-sm-12 col-md-12 col-lg-4 col-lg-offset-5">
                                <button class="btn grey" type="submit">Modificar</button>
                            </div>

                            {!! Form::close() !!}
                    </div>
                </div>
    </div>
</div>
@endsection
@section('javascript')
@toastr_js
@toastr_render
@endsection