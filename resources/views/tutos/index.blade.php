@extends('tutos.app')
@section('css')
  <style>
    .page-header {
      height: 10vh;
    }

    a h6 {
      color: #737373;
    }
  </style>
@endsection
@section('content')
  @if (Auth::check())

        <div class="container">
          <div class="page-header">
            <h3 class="text-center">Tutoriales</h3>
            <hr>
          </div>
          <div class="row">

            <div class="col-md-4 animated fadeIn">
              <a href="">

                <div class="center">
                  <img src="{{ asset('img/Writer.png') }}" alt="" class="img-responsive">
                </div>

              </a>
            </div>

            <div class="col-md-4 animated fadeIn">
              <a href="{{ route('officecalc.index') }}">

                <div class="center">
                  <img src="{{ asset('img/Calc.png') }}" alt="" class="img-responsive">

                </div>

              </a>
            </div>

            <div class="col-md-4 animated fadeIn">
              <a href="">

                <div class="center">
                  <img src="{{ asset('img/Impress.png') }}" alt="" class="img-responsive">

                </div>

              </a>
            </div>

          </div>

          <div class="row">

            <div class="col-md-4 animated fadeIn">

              <a href="">

                <div class="center">
                  <img src="{{ asset('img/Base.png') }}" alt="" class="img-responsive">

                </div>

              </a>

            </div>

            <div class="col-md-4 animated fadeIn">
              <a href="">

                <div class="center">

                  <img src="{{ asset('img/Correo.png') }}" alt="" class="img-responsive">

                </div>

              </a>
            </div>

            <div class="col-md-4">

            </div>

          </div>
        </div>

  @endif

@endsection
