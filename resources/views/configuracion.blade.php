@extends('layouts.app')
@section('content')
    @if(Auth::check())
    <div class="cajaloca caja-2 animated zoomIn">
        <div class="header ">
            <h3 class="text-center">Avatar</h3>
        </div>
        @if (session('status1'))
            <div class="container alert alert-default text-center" role="alert" data-dismiss="alert">
                {{ session('status1') }}
            </div>
        @endif
     <div class="row">
            <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-6 col-md-1 col-sm-1">
                <div class="card card-stats caja-2">
                    <div class="card-content">
                        {!! Form::open(['route' => 'upload', 'method' => 'POST', 'files' => true]) !!}
                        {{ csrf_field() }}

                        {!! Form::label('foto', 'Cambiar foto de perfil') !!}
                    </div>
                    <div class="card-footer">
                        <div class="row">

                        {!! Form::file('image', ['accept' => 'image/jpg']) !!}

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        {!! Form::submit('Subir', ['class' => 'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
            <div class="media col-lg-offset-1 col-lg-2 col-md-3">
                <div class="card card-img caja-1">
                    <img src="storage/{{ Auth::user()->username }}.jpg" alt="Avatar..." class="img-responsive img-thumbnail">
                </div>
            </div>
        </div>
    </div>
    <div class="cajaloca caja-2 animated zoomIn">
        <div class="header">
            <h3 class="text-center">Cambio de Contraseña</h3>
        </div>
        <div class="form-group">
                {!! Form::open(['route' => 'update']) !!}
            <div class="row">
                <div class="col-md-offset-4 col-lg-6">
                    {!! Form::label('Contraseña: ') !!}
                    {!! Form::password('newPass') !!}
                    {!! Form::submit('Cambiar', ['class' => 'btn btn-warning btn-sm']) !!}
                </div>
            </div>
                {!! Form::close() !!}
            @if (session('status'))
                <div class="container alert alert-default text-center" role="alert" data-dismiss="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    </div>
@endif
    @endsection