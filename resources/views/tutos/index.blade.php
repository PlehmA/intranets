@extends('tutos.app')
@section('css')
  <style>
    .page-header {
      height: 10vh;
    }

    a h6 {
      color: #737373;
    }
  
/* .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
    width: 153px;
    height: 185px;
    display: initial;
} */
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
              <div class="col-md-4 animated fadeIn"> {{--ACA EMPIEZA EXCEL --}}
                  <a href="{{ route('excel.index') }}">

                          <div class="center">
          
                            <img src="{{ asset('img/EXCEL/excel_icono.png') }}" alt="" class="img-responsive">
          
                          </div>
          
                        </a>
          </div> {{--ACA TERMINA EXCEL --}}

              <div class="col-md-4 animated fadeIn"> {{--ACA EMPIEZA WORD --}}
  
                <a href="{{ route('word.index') }}">
  
                  <div class="center">
                    <img src="{{ asset('img/WORD/word_icon.png') }}" alt="" class="img-responsive">
  
                  </div>
  
                </a>
  
              </div>{{--ACA TERMINA WORD --}}
              
             
              <div class="col-md-4 animated fadeIn"> {{--ACA EMPIEZA CORREO --}}
                  <a href="{{ url('/correotutos') }}">
                          
                          <div class="center">
                              
                              <img src="{{ asset('img/Correo.png') }}" alt="" class="img-responsive">
                              
                          </div>
                          
                      </a>
                  </div>
             
              
  
            </div> {{--ACA TERMINA CORREO --}}
          <div class="row">

              <div class="col-md-4 animated fadeIn">{{--ACA EMPIEZA ONE DRIVE --}}
                  <a href="{{ route('onedrive.index') }}">

                          <div class="center">
          
                            <img src="{{ asset('img/onedrive/one_drive_icon.png') }}" alt="" class="img-responsive">
          
                          </div>
          
                        </a>
          </div>{{--ACA TERMINA ONE DRIVE --}}

          <div class="col-md-4 animated fadeIn">
              <a href="{{ route('officecalc.index') }}">

                <div class="center">
                  <img src="{{ asset('img/Calc.png') }}" alt="" class="img-responsive">

                </div>

              </a>
            </div>
            
            <div class="col-md-4 animated fadeIn">
              <a href="{{ route('officewriter.index') }}">

                <div class="center">
                  <img src="{{ asset('img/Writer.png') }}" alt="" class="img-responsive">
                </div>

              </a>
            </div>

          

          </div>

          <div class="row">

            <div class="col-md-4 animated fadeIn">

              <a href="{{ route('officebase.index') }}">

                <div class="center">
                  <img src="{{ asset('img/Base.png') }}" alt="" class="img-responsive">

                </div>

              </a>

            </div>
            <div class="col-md-4 animated fadeIn">
                <a href="{{ route('officeimpress.index') }}">
  
                  <div class="center">
                    <img src="{{ asset('img/Impress.png') }}" alt="" class="img-responsive">
  
                  </div>
  
                </a>
              </div>
 

          </div>
       
        </div>

  @endif

@endsection
