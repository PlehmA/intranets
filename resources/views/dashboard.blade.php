@extends('layouts.app')
@section('css')
<style>
.navbar.navbar-transparent {
  background-color: transparent;
  box-shadow: none;
  border-bottom: 0;
}

</style>
@endsection
@section('content')
  <div class="container-fluid" style="margin-left: 10vh; margin-right: 10vh;">
    <div class="row animated fadeIn">
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('images/imagenprueba1.jpg')}}">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">Ver mas...</a>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('images/imagenprueba2.jpg')}}">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">Ver mas...</a>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
              <img src="{{ asset('images/imagenprueba3.jpg')}}">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">Ver mas...</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row animated fadeIn">
          <div class="col s12 m4">
            <div class="card">
              <div class="card-image">
                <img src="{{ asset('images/imagenprueba1.jpg')}}">
                <span class="card-title">Card Title</span>
              </div>
              <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="#">Ver mas...</a>
              </div>
            </div>
          </div>
          <div class="col s12 m4">
            <div class="card">
              <div class="card-image">
                <img src="{{ asset('images/imagenprueba2.jpg')}}">
                <span class="card-title">Card Title</span>
              </div>
              <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="#">Ver mas...</a>
              </div>
            </div>
          </div>
          <div class="col s12 m4">
            <div class="card">
              <div class="card-image">
                <img src="{{ asset('images/imagenprueba3.jpg')}}">
                <span class="card-title">Card Title</span>
              </div>
              <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.</p>
              </div>
              <div class="card-action">
                <a href="#">Ver mas...</a>
              </div>
            </div>
          </div>
        </div>
  </div>


    @endsection
