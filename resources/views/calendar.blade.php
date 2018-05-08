@extends('layouts.app')
@section('content')

<div id="calendar"></div>

    @endsection
    @section('script')
      <script>
          moment().format();
      </script>
      <script>
      $(document).ready(function() {
        $('#calendar').fullCalendar({
          weekends: false,
        });
      });

      </script>


    @endsection
