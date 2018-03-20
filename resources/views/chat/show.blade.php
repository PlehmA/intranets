@extends('layouts.app')
@section('content')
    <div class="continue">
        <div class="col-lg-offset-3 col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    {{ $friend->name }} <a href="{{ route('chat.index') }}" class="btn btn-default">Atras</a>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
@endsection