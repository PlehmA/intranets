@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="col-lg-2">
    <div class="col-lg-12">
        <div class="panel panel-heading" style="background-color: #1b6d85; color: white;">
        <p><u>Amigos Conectados</u></p>
        </div>
        @forelse($friends as $friend)
        <div class="panel panel-body">
            {{ $friend->name }}
        </div>
            @empty
            <div class="panel panel-body">
                <p>No tienes amigos conectados.</p>
            </div>
            @endforelse
    </div>
</div>
</div>
@endsection