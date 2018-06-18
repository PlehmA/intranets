@extends('tutos.app')
@section('css')
<style>
.scrollbar {
    margin-left: 30px;
    float: left;
    height: 300px;
    width: 65px;
    background: #fff;
    overflow-y: scroll;
    margin-bottom: 25px;
}
.force-overflow {
    min-height: 450px;
}

.scrollbar-primary::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-primary::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #4285F4; }

.scrollbar-danger::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-danger::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-danger::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #ff3547; }

.scrollbar-warning::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-warning::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-warning::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #FF8800; }

.scrollbar-success::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-success::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-success::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #00C851; }

.scrollbar-info::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-info::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-info::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #33b5e5; }

.scrollbar-default::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-default::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-default::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #8F8E8F; }

.scrollbar-secondary::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-secondary::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-secondary::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #aa66cc; }
.collection {
  margin-top: -5px;
}
a .material-icons {
  vertical-align: initial;
}
.btn-gris {
  margin-top: 4vh;
}
.form-group.is-focused .form-control {
  background-image: none;
  border-bottom: none;
}
* {
  border-bottom: initial;
}
</style>
@endsection
@section('content')
  @if (Auth::check())
<div class="container-fluid"> {{-- Empieza el contenedor --}}

<div class="row" style="margin-bottom: 0px;">
  <div class="col-sm-9">
<a href="{{ route('tutos.index') }}" class="btn grey btn-small">Volver</a>
  </div>

<div class="col-sm-3">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar..." id="buscador">
      <span class="input-group-btn" style="margin-top: 1vh;">
         <i class="material-icons">search</i>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div>

@foreach ($impoffice as $offimp)
<div class="row">

  <div class="col s9">
<video poster="{{ $offimp->foto_video }}" id="player" playsinline controls>
    <source src="{{ url($offimp->video) }}" type="video/mp4">
</video>

  </div>
  <div class="right col s3 scrollbar scrollbar-default" style="height: 59vh;">
    <div class="force-overflow">
@foreach ($impmenu as $menu)

    <ul class="collection">
      <a href="{{ $impoffice->url($menu->id) }}">
        <li class="collection-item avatar" style="border-bottom: 1px solid #e0e0e0; background-color: #ddd; color: #444; min-height: 70px;">
          <img src="{{ asset($menu->foto_video) }}" alt="" class="circle">
          <b><span class="title nombres">{{ $menu->titulo }}</span></b>
        </li>
      </a>
    </ul>

@endforeach
    </div>
  </div>
  <div class="col s3 container">
    <ul class="pagination">
        <li class="waves-effect"><a href="{{ $impoffice->previousPageUrl() }}" class="anterior" title="Video anterior"><i class="material-icons">skip_previous</i></a></li>
        <li class="waves-effect"><a href="{{ $impoffice->url($impoffice->currentPage()) }}">{{ $impoffice->currentPage() }}</a></li>
        <li class="waves-effect"><a href="{{ $impoffice->nextPageUrl() }}" class="siguiente" title="Siguiente video"><i class="material-icons">skip_next</i></a></li>
      </ul>
  </div>
</div>

@endforeach
</div>{{-- Termina el contenedor --}}

  @endif
  @endsection
  @section('script')
    <script>
    tippy('.anterior');
    tippy('.siguiente');
    </script>
  @endsection
