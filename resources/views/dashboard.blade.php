@extends('layouts.app')
@section('css')
<style>
.navbar.navbar-transparent {
  background-color: transparent;
  box-shadow: none;
  border-bottom: 0;
}
.card {
  margin-left: 5px;
}
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="animado valign-wrapper" style="margin-top: 8vh;"> <!-- ACA EMPIEZA SLIDER -->

      <div class="card">
          <div class="card-image">
            <img src="{{ asset('images/imagenprueba1.jpg') }}">
            <span class="card-title">Card Title</span>
          </div>
          <div class="card-content">
            <p>I am a very simple card. I am good at containing small bits of information.
            I am convenient because I require little markup to use effectively.</p>
          </div>
          <div class="card-action">
            <a href="#">This is a link</a>
          </div>
        </div>

        <div class="card">
            <div class="card-image">
              <img src="{{ asset('images/imagenprueba2.jpg') }}">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>

          <div class="card">
              <div class="card-image">
                <img src="{{ asset('images/imagenprueba3.jpg') }}">
                <span class="card-title">Card Title</span>
              </div>
              <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="#">This is a link</a>
              </div>
            </div>

            <div class="card">
                <div class="card-image">
                  <img src="{{ asset('images/imagenprueba3.jpg') }}">
                  <span class="card-title">Card Title</span>
                </div>
                <div class="card-content">
                  <p>I am a very simple card. I am good at containing small bits of information.
                  I am convenient because I require little markup to use effectively.</p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                </div>
              </div>

              <div class="card">
                  <div class="card-image">
                    <img src="{{ asset('images/imagenprueba2.jpg') }}">
                    <span class="card-title">Card Title</span>
                  </div>
                  <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
                  </div>
                  <div class="card-action">
                    <a href="#">This is a link</a>
                  </div>
                </div>

                <div class="card">
                    <div class="card-image">
                      <img src="{{ asset('images/imagenprueba1.jpg') }}">
                      <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                      <p>I am a very simple card. I am good at containing small bits of information.
                      I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                      <a href="#">This is a link</a>
                    </div>
                  </div>


    </div><!-- ACA TERMINA SLIDER -->
</div>
        

    @endsection

    @section('javascript')
    <script>
      $(document).ready(function () {
        $('.animado').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 5000,
      });
      });
    </script>
    @endsection
