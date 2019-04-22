@extends('layouts.app')
@section('content')
    @foreach ($tutoriales as $tutorial)
       <pre>{{$tutorial}}</pre>
    @endforeach
@endsection