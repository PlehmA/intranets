@extends('calendario.app')
@section('content')

<div id='calendar'></div>
    @endsection
@section('jsscript')
  <script type="text/javascript">
      const eventos = {!! json_encode($eventos) !!};
      console.log(eventos);
  </script>
@endsection
