@extends('notes.app')
@section('css')
<style>
  .lateralizq {
    max-height: 75vh;
    overflow-y: scroll;
  }
  .scrollbar-juicy-peach::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-juicy-peach::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-juicy-peach::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left top, right top, from(#ffecd2), to(#fcb69f));
  background-image: -webkit-linear-gradient(left, #ffecd2 0%, #fcb69f 100%);
  background-image: linear-gradient(to right, #ffecd2 0%, #fcb69f 100%); }

.scrollbar-young-passion::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-young-passion::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-young-passion::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left top, right top, from(#ff8177), color-stop(0%, #ff867a), color-stop(21%, #ff8c7f), color-stop(52%, #f99185), color-stop(78%, #cf556c), to(#b12a5b));
  background-image: -webkit-linear-gradient(left, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%);
  background-image: linear-gradient(to right, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%); }

.scrollbar-lady-lips::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-lady-lips::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-lady-lips::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#ff9a9e), color-stop(99%, #fecfef), to(#fecfef));
  background-image: -webkit-linear-gradient(bottom, #ff9a9e 0%, #fecfef 99%, #fecfef 100%);
  background-image: linear-gradient(to top, #ff9a9e 0%, #fecfef 99%, #fecfef 100%); }

.scrollbar-sunny-morning::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-sunny-morning::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-sunny-morning::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #f6d365 0%, #fda085 100%);
  background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%); }

.scrollbar-rainy-ashville::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-rainy-ashville::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-rainy-ashville::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#fbc2eb), to(#a6c1ee));
  background-image: -webkit-linear-gradient(bottom, #fbc2eb 0%, #a6c1ee 100%);
  background-image: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%); }

.scrollbar-frozen-dreams::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-frozen-dreams::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-frozen-dreams::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#fdcbf1), color-stop(1%, #fdcbf1), to(#e6dee9));
  background-image: -webkit-linear-gradient(bottom, #fdcbf1 0%, #fdcbf1 1%, #e6dee9 100%);
  background-image: linear-gradient(to top, #fdcbf1 0%, #fdcbf1 1%, #e6dee9 100%); }

.scrollbar-warm-flame::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-warm-flame::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-warm-flame::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
  background-image: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%); }

.scrollbar-night-fade::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-night-fade::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-night-fade::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#a18cd1), to(#fbc2eb));
  background-image: -webkit-linear-gradient(bottom, #a18cd1 0%, #fbc2eb 100%);
  background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%); }

.scrollbar-spring-warmth::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-spring-warmth::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-spring-warmth::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#fad0c4), to(#ffd1ff));
  background-image: -webkit-linear-gradient(bottom, #fad0c4 0%, #ffd1ff 100%);
  background-image: linear-gradient(to top, #fad0c4 0%, #ffd1ff 100%); }

.scrollbar-winter-neva::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-winter-neva::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-winter-neva::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #a1c4fd 0%, #c2e9fb 100%);
  background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%); }

.scrollbar-dusty-grass::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-dusty-grass::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-dusty-grass::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #d4fc79 0%, #96e6a1 100%);
  background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); }

.scrollbar-tempting-azure::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-tempting-azure::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-tempting-azure::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #84fab0 0%, #8fd3f4 100%);
  background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%); }

.scrollbar-heavy-rain::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-heavy-rain::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-heavy-rain::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#cfd9df), to(#e2ebf0));
  background-image: -webkit-linear-gradient(bottom, #cfd9df 0%, #e2ebf0 100%);
  background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%); }

.scrollbar-amy-crisp::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-amy-crisp::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-amy-crisp::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #a6c0fe 0%, #f68084 100%);
  background-image: linear-gradient(120deg, #a6c0fe 0%, #f68084 100%); }

.scrollbar-mean-fruit::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-mean-fruit::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-mean-fruit::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #fccb90 0%, #d57eeb 100%);
  background-image: linear-gradient(120deg, #fccb90 0%, #d57eeb 100%); }

.scrollbar-deep-blue::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-deep-blue::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-deep-blue::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #e0c3fc 0%, #8ec5fc 100%);
  background-image: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%); }

.scrollbar-ripe-malinka::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-ripe-malinka::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-ripe-malinka::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #f093fb 0%, #f5576c 100%);
  background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%); }

.scrollbar-cloudy-knoxville::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-cloudy-knoxville::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-cloudy-knoxville::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-linear-gradient(330deg, #fdfbfb 0%, #ebedee 100%);
  background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); }

.scrollbar-morpheus-den::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-morpheus-den::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-morpheus-den::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#30cfd0), to(#330867));
  background-image: -webkit-linear-gradient(bottom, #30cfd0 0%, #330867 100%);
  background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%); }

.scrollbar-rare-wind::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-rare-wind::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-rare-wind::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#a8edea), to(#fed6e3));
  background-image: -webkit-linear-gradient(bottom, #a8edea 0%, #fed6e3 100%);
  background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%); }

.scrollbar-near-moon::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-near-moon::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-near-moon::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-image: -webkit-gradient(linear, left bottom, left top, from(#5ee7df), to(#b490ca));
  background-image: -webkit-linear-gradient(bottom, #5ee7df 0%, #b490ca 100%);
  background-image: linear-gradient(to top, #5ee7df 0%, #b490ca 100%); }

 .collection .collection-item.active {
    background-color: #dddddd;
    color: black;
  }
  .collection a.collection-item {
    color: #9e9e9e;
  }
  .collection a.collection-item:not(.active):hover{
    background-color: #dddddd;
    color: black;
  }

  textarea.materialize-textarea {
    background-color: initial;
    line-height: normal;
    overflow-y: scroll;
    padding: initial;
    resize: initial;
    min-height: initial;
    -webkit-box-sizing: initial;
    box-sizing: initial;
    background-color: transparent;
    border: initial;
    border-bottom: initial;
    border-radius: initial;
    outline: initial;
    height: initial;
    width: initial;
    font-size: initial;
    margin: initial;
    padding: initial;
    -webkit-box-shadow: initial;
    box-shadow: initial;
    -webkit-box-sizing: initial;
    box-sizing: initial;
    -webkit-transition: initial;
    transition: initial;
    transition: box-shadow initial;
    transition: box-shadow initial;

  }
  .collection.with-header .collection-item {
    padding-left: 10px;
}
.modal {
  background-color: initial;
  max-height: initial;
  bottom: initial;
}
</style>
@endsection
@section('content')
  <div class="row">
    <div class="col s2 m2 l2">

          <div class="input-field">
            <input id="buscador" type="text" class="validate">
            <label for="buscador">Buscar...</label>
          </div>

          <ul class="collection with-header lateralizq scrollbar-rare-wind">
              <li class="collection-header"><h4>Notas</h4></li>
              @foreach ($notas as $note)
                <a href="{{ action('NoteController@show', $note->id) }}" class="secondary-content" style="width: 100%;"><li class="collection-item"><div class="nombres"><b>
                  @if (strlen($note->nombre_nota) >= 17)
                    {{ substr_replace($note->nombre_nota, '...', 16) }}
                    @else
                      {{ $note->nombre_nota }}
                @endif
                </b></div></li></a>
              @endforeach

            </ul>
    </div>
    <div class="col s10 m10 l10">
      <div class="col s10 m10 l10">

                <a class="nav-link btn grey left modal-trigger" href="#modal1">Nueva nota <i class="fas fa-plus"></i></a>


                <a class="nav-link btn grey right" href="#!">Borrar nota <i class="far fa-trash-alt"></i></a>

        </ul>
      </div>
      <div class="col s10 m10 l10">

      <form><textarea id="textarea" autofocus></textarea></form>

      </div>
    </div>
  </div>

  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Crear nota</h4>
        <hr>
      <div class="row">
   <form class="col s12" id="modalForm" method="POST" action="{{ route('notes.store') }}">
     {{ csrf_field() }}
     <div class="row">
       <div class="input-field col s12">
         <input id="nombre_nota" type="text" name="nombre_nota" class="validate" required>
         <label for="nombre_nota">Nombre de nota</label>
       </div>
     </div>
     <div class="input-field col s7">
       <button class="btn grey waves-effect waves-light right" type="submit" name="action" form="modalForm">Crear
         <i class="material-icons right">send</i>
       </button>
     </div>
   </form>
  </div>

    </div>
  </div>
@endsection
@section('javascript')
  <script src="{{ asset('tinymce\js\tinymce\tinymce.min.js') }}"></script>
    <script>
    tinymce.init({
       selector: 'textarea',
       height: 500,
       menubar: false,
       plugins: [
         'advlist autolink lists link image charmap print preview anchor textcolor',
         'searchreplace visualblocks code fullscreen',
         'insertdatetime media table contextmenu paste code help wordcount'
       ],
       toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
           });
</script>
<script>
  $(".main-panel").perfectScrollbar('destroy');

  $(document).ready(function(){
  $('#buscador').keyup(function(){
     var nombres = $('.nombres');
     var buscando = $(this).val();
     console.log(buscando);
     var item='';
     for( var i = 0; i < nombres.length; i++ ){
         item = $(nombres[i]).html().toLowerCase();
         item = item.replace(new RegExp(/\s/g),"");
         item = item.replace(new RegExp(/[àáâãäå]/g),"a");
         item = item.replace(new RegExp(/[èéêë]/g),"e");
         item = item.replace(new RegExp(/[ìíîï]/g),"i");
         item = item.replace(new RegExp(/ñ/g),"n");
         item = item.replace(new RegExp(/[òóôõö]/g),"o");
         item = item.replace(new RegExp(/[ùúûü]/g),"u");
          for(var x = 0; x < item.length; x++ ){
              if( buscando.length == 0 || item.indexOf( buscando ) > -1 ){
                console.log(nombres[i]);
                  $(nombres[i]).parents('.collection-item').show();
              }else{
                console.log(nombres[i]);
                   $(nombres[i]).parents('.collection-item').hide();
              }
          }
     }
  });

  $('.modal').modal();
  });
</script>
@endsection
