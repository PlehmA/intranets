@extends('layouts.app')
@section('content')
  @if (Auth::check())
    <div class="embed-container">
          <iframe width="560" height="315" src="https://test.odontopraxis.com.ar:9003/roundcube" frameborder="0" allowfullscreen></iframe>
    </div>
  @endif
@endsection
