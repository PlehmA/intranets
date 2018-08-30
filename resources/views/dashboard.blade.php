@extends('layouts.app')
@section('css')
<style>

.card {
      margin-right: 5px;
    }
.container-fluids{
    width: 80%;
    margin-left: 15vh;
}
@media screen and (max-width: 480px){
    .content{
        margin-top: 4vh;
    }
}
@media screen and (max-width: 480px){
    .content{
        margin-top: 4vh;
    }
}

@media screen and (max-width: 1400px){
    .content{
        margin-top: 4vh;
    }
    .card {
      margin-right: 5px;
      height: 80vh;
    }
  
}
.modals {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 5000; /* Sit on top */
    padding-top: 1vh; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* modals Content */
.modals-content {
    background-color: #e0e0e0;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 38%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
.slider-modal img{
    margin-left: 1vh;
    height: 80vh;
}
.btn-aceptar{
    display: none;
    margin-left: auto;
}
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="animado valign-wrapper" style="margin-top: 8vh;"> <!-- ACA EMPIEZA SLIDER -->

<<<<<<< HEAD
        @foreach ($news as $noticia)
            
=======
>>>>>>> f23b2c228454d36a27815af21f34176cd99d73b7
      <div class="card hoverable">
          <div class="card-image">
            <img src="{{ asset('storage/images/'.$noticia->foto) }}">
            <span class="card-title">{{ $noticia->titulo }}</span>
          </div>
          <div class="card-content">
            <p>{{ substr_replace($noticia->cuerpo, '...', 200) }}</p>
          </div>
          <div class="card-action">
            <a href="{{ route('noticia.show', $noticia->id) }}"  target="_blank">Ver mas...</a>
          </div>
        </div>
        
        @endforeach

<<<<<<< HEAD
    </div><!-- ACA TERMINA SLIDER -->
</div>

@if(0 === $modal)
 <!-- Modal Structure -->
 <div id="myModal" class="modals">

        <!-- Modal content -->
        <div class="modals-content">
            <div class="slider-modal">
                    @foreach ($news as $noticia)
=======
        <div class="card hoverable">
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

          <div class="card hoverable">
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

            <div class="card hoverable">
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

              <div class="card hoverable">
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

                <div class="card hoverable">
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
>>>>>>> f23b2c228454d36a27815af21f34176cd99d73b7

                    <div>
                        <a href="{{ route('noticia.show', $noticia->id) }}" target="_blank">
                            <img src="{{ asset('storage/images/'.$noticia->foto) }}">
                        </a>
                    </div>

                    @endforeach
            </div>
          <div>
            {!! Form::open(['route' => 'modal.store', 'method' => 'POST']) !!}
            @csrf
            <input type="hidden" name="sbid" value="{{ Auth::user()->id }}">
            <input type="hidden" name="nov_vista" value="true">
            <button type="submit" class="btn grey hoverable btn-aceptar">Gracias</button>
            {!! Form::close() !!}   
        </div>
        </div>
      </div>
@else

@endif
    @endsection

    @section('javascript')
    <script>
      $(document).ready(function () {
        $('.main-panel').perfectScrollbar('destroy');
        $('.animado').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
      });

var modal = $('#myModal');

// Get the <span> element that closes the modal
var span = $(".close")[0];

$(modal).css('display', 'block');

// When the user clicks on <span> (x), close the modal
$(span).click(function (e) { 
    e.preventDefault();
    $(modal).css('display', 'none');
});
$('.slider-modal').slick({
    infinite: false,
});
    // On swipe event
var cantidad = {{ $news->count() }};
// On before slide change
$('.slider-modal').on('beforeChange', function(event, slick, currentSlide, nextSlide){
    console.log(nextSlide);
  if((cantidad-1) == nextSlide){
      $('.btn-aceptar').css('display', 'block');
  }
});


});
</script>
@endsection
