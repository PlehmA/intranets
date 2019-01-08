@extends('correo.app')
@section('content')
  @if (Auth::check())
  
    <div class="embed-container">
     

          <iframe width="560" height="315" src="roundcube?_task=login&email={{ base64_encode(Auth::user()->email) }}&contra_mail={{ base64_encode(Auth::user()->contra_mail) }}" frameborder="0" allowfullscreen></iframe>
          
    </div>
  @endif
@endsection
