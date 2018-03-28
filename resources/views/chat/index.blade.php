@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="col-lg-2">
    <div class="col-lg-12">
        <div class="panel panel-heading" style="background-color: #1b6d85; color: white;">
        <p>Usuarios Conectados</p>
        </div>
        @forelse($friends as $friend)
            <a href="{{ route('chat.show', $friend->id) }}" class="panel panel-body">{{ $friend->name }}</a>
            @empty
            <div class="panel panel-body">
                <p>No tienes amigos conectados.</p>
            </div>
            @endforelse
    </div>
</div>
</div>
@endsection