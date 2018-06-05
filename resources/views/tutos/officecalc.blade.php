@extends('tutos.app')
@section('content')
  @if (Auth::check())
<div class="container-fluid"> {{-- Empieza el contenedor --}}

@foreach ($calcoffice as $offcalc)
<div class="row">

  <div class="col s9">
<video poster="{{ $offcalc->foto_video }}" id="player" playsinline controls>
    <source src="{{ url($offcalc->video) }}" type="video/mp4">
    <!-- Captions are optional -->
    {{-- <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default> --}}
</video>

  </div>
@foreach ($calcmenu as $menu)
  <div class="right col s3" id="menuScroll">
    <ul class="collection">
      <a href="{{ route('officecalc.index') }}">
        <li class="collection-item avatar" style="border-bottom: 1px solid #e0e0e0; background-color: #ddd; color: #444;">
          <img src="{{ asset($menu->foto_video) }}" alt="" class="circle">
          <b><span class="title">{{ $menu->titulo }}</span></b>
        </li>
      </a>
    </ul>
  </div>
@endforeach


</div>
<div class="col s12">
  <br>
<p class="flow-text left">{{ $offcalc->titulo }}</p>
</div>
<div class="col s8 container">
  <ul class="pagination right">
      <li class="waves-effect"><a href="{{ $calcoffice->previousPageUrl() }}">Anterior</a></li>
      <li class="waves-effect"><a href="{{ $calcoffice->nextPageUrl() }}">Siguiente</a></li>
    </ul>
</div>

@endforeach

</div>{{-- Termina el contenedor --}}

  @endif
  @endsection
