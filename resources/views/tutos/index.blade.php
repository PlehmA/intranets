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
                  <img src="{{ asset('img/LibreOffice_Writer.png') }}" alt="" class="img-responsive">
                  <h6>Libre Office Writer</h6>
                </div>

              </a>
            </div>

            <div class="col-md-4 animated fadeIn">
              <a href="{{ route('officecalc.index') }}">

                <div class="center">
                  <img src="{{ asset('img/libreoffice_calc.png') }}" alt="" class="img-responsive">
                  <h6>Libre Office Calc</h6>
                </div>

              </a>
            </div>

            <div class="col-md-4 animated fadeIn">
              <a href="">

                <div class="center">
                  <img src="{{ asset('img/LibreOffice_Impress.png') }}" alt="" class="img-responsive">
                  <h6>Libre Office Impress</h6>
                </div>

              </a>
            </div>

          </div>

          <div class="row">

            <div class="col-md-4 animated fadeIn">

              <a href="">

                <div class="center">
                  <img src="{{ asset('img/LibreOffice_Base.png') }}" alt="" class="img-responsive">
                  <h6>Libre Office Base</h6>
                </div>

              </a>

            </div>

            <div class="col-md-4">

            </div>

            <div class="col-md-4">

            </div>

          </div>
        </div>

  @endif

@endsection
