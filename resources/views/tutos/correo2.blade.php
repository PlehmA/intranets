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
.imagen-box{
  max-width: 100vh;
}
.collection .collection-item.active{
  background-color: #8c8c8c;
}
.collection a.collection-item {
    color: #8c8c8c;
}
.collection a.collection-item:not(.active):hover {
    background-color: #e6e6e6;
}
</style>
@endsection
@section('content')
  @if (Auth::check())
  <main id="app">
    <div class="container-fluid">
      <div class="col s9" style="margin-top: 2vh; text-align: laft; margin-bottom: 2vh;">
        <a href="{{ route('tutos.index') }}" class="btn grey btn-small">Volver</a>
      </div>
      <div class="row">
        <div class="col s3">
            <div class="collection">
                <a href="{{ url('/correotutos') }}" class="collection-item">Creación de carpetas</a>
                <a href="{{ url('/correotutos4') }}" class="collection-item">Eliminar carpeta</a>
                <a href="{{ url('/correotutos2') }}" class="collection-item">Crear contactos</a>
                {{-- <a href="{{ url('/correotutos3') }}" class="collection-item active">Importar contactos</a> --}}
              </div>
        </div>
    
     
    <main class="col s9" style="margin-top: -11vh;">
 
        <div class="row">
          <div class="col s12">
            <a href="{{asset('img/correo/importar_contactos/1.png')}}" target="_blank"><img src="{{asset('img/correo/importar_contactos/1.png')}}" alt="" class="imagen-box"></a>
            </div>
        </div>
        <div class="row">
          <div class="col s12">
            <a href="{{asset('img/correo/importar_contactos/2.png')}}" target="_blank"><img src="{{asset('img/correo/importar_contactos/2.png')}}" alt="" class="imagen-box"></a>
            </div>
        </div>
        <div class="row">
          <div class="col s12">
            <a href="{{asset('img/correo/importar_contactos/3.png')}}" target="_blank"><img src="{{asset('img/correo/importar_contactos/3.png')}}" alt="" class="imagen-box"></a>
            </div>
        </div>
    </main>
    </div>
    </div>
  </main>

  @endif
  @endsection
  @section('script')
 <script>
        $('.materialboxed').materialbox();
 </script>

  @endsection
