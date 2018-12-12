@extends('rrhh.app')

@section('css')
<style>
    .reportePer{
        color: black;
    }
    .reportePer a{
      pointer-events: none;
      cursor: default;
      text-decoration: none;
      color: black;
    }
    </style>
@endsection
@section('content')
<main id="report">
    <div class="row">
        <div class="col-lg-3">
                <p>
                        <label>
                          <input class="with-gap" name="group1" type="radio" v-model="row" value="1"/>
                          <span>Reporte anual</span>
                        </label>
                      </p>
        </div>
        <div class="col-lg-3">
                <p>
                    <label>
                        <input class="with-gap" name="group1" type="radio" v-model="row" value="2"/>
                        <span>Reporte por período</span>
                    </label>
                    </p>
        </div>
    </div>

{{-- REPORTE ANUAL --}}

<form action="{{ route('report.create') }}" class="col-lg-4" v-if="row == 1" method="GET">
    @csrf
            <select class="browser-default" name="user_id">
                    <option value="0" selected>Todos</option>
            @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
                  </select>
                  <select class="browser-default" name="anioanual">
                      @foreach ($anios as $anio)
                      <option value="{{ $anio->fecha }}">{{ $anio->fecha }}</option>
                      @endforeach
                      </select>
                      <div class="col-lg-12">
                            <button class="btn grey btn-block">Consultar reporte</button>
                          </div>
    </form>

{{-- REPORTE ANUAL --}}

{{-- REPORTE POR PERIODO --}}

    <form action="{{ route('report.store') }}" class="col-lg-4" v-if="row == 2" method="POST">
        @csrf
            <select class="browser-default" name="user_id">
                    <option value="0" selected>Todos</option>
            @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
                  </select>
                  <br>
                  <div class="row">
                      <div class="col-lg-6">
                            <label for="diadesde">Desde: </label><input type="date" name="fecha_de" id="diadesde" value="{{ date('Y-m-d') }}">
                      </div>
                      <div class="col-lg-6">
                            <label for="diahasta">Hasta: </label><input type="date" name="fecha_hasta" id="diahasta" value="{{ date('Y-m-d') }}">
                      </div>
                  </div>
                  <div class="col-lg-12">
                    <button class="btn grey btn-block">Consultar reporte</button>
                  </div>
                
    </form>

{{-- REPORTE POR PERIODO --}}

</main>
@endsection
@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script>
    new Vue({ 
        el: '#report',
        data () {
            return {
                column: null,
                row: null,
                }
            }
    })
  </script>
@endsection