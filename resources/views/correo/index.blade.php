@extends('correo.app')
@section('content')
  @if (Auth::check())
    <div class="embed-container">
        <iframe width="560" height="315" src="rainloop" frameborder="0" allowfullscreen></iframe>
    </div>
  @endif
@endsection
