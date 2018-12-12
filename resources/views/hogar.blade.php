@extends('layouts.app')
@section('css')
@endsection
@section('content')
<h1>Pusher Test</h1>
<p>
  Try publishing an event to channel <code>my-channel</code>
  with event name <code>my-event</code>.
</p>
@endsection
@section('javascript')
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('aef2af4b509111a374a7', {
      cluster: 'us2',
      encrypted: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
@endsection