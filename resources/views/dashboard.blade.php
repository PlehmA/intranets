@extends('layouts.app')
@section('css')
<style>
@media only screen and (max-width: 1400px){
.main-panel {
    padding: 0px 60px;
}
.main-panel>.content {
    padding: 0px 30px;
    margin-top: 50px;
}
}
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="animado valign-wrapper"> <!-- ACA EMPIEZA SLIDER -->

        @foreach ($news as $noticia)
            
      <div class="card hoverable">
          <div class="card-image">
            <img src="{{ asset('storage/images/'.$noticia->foto) }}">
            <span class="card-title">{{ $noticia->titulo }}</span>
          </div>
          <div class="card-content">
              @if(strlen($noticia->atajo) >= 270)
            <p>{{ substr_replace($noticia->atajo, '...', 270) }}</p>
            @else
            <p>{{ $noticia->atajo }}</p>
            @endif
          </div>
          <div class="card-action">
            <a href="{{ route('noticia.show', $noticia->id) }}"  target="_blank"><b>Ver mas...</b></a>
          </div>
        </div>
        
        @endforeach

    </div><!-- ACA TERMINA SLIDER -->
</div>

@if($newsblack->count() >= 1 && $modal == 0)
{{-- {{dd($newsblack->count())}} --}}
{{-- {{ dd($modal) }} --}}
 <!-- Modal Structure -->
 <div id="myModal" class="modals">

        <!-- Modal content -->
        <div class="modals-content">
            <div class="slider-modal">
                    @foreach ($newsblack as $noticia)

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
                <button type="submit" class="btn grey hoverable btn-aceptar">Continuar</button>
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
// var cantidad = {{ $news->count() }};
// // On before slide change
// $('.slider-modal').on('beforeChange', function(event, slick, currentSlide, nextSlide){
//     // console.log(nextSlide);
//     // console.log(currentSlide);
//   if((cantidad-1) == nextSlide){
//       $('.btn-aceptar').css('display', 'block');
//   }
// });

});
</script>
@endsection
