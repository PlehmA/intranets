@extends('layouts.app')
@section('content')
    @if(Auth::check())

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
