@extends('chat.app')
@section('style')
  <style media="screen">
  .contacts:hover {
    background-color: #e3e3e3;
  }
  #frame .content .messages ul li.replies p{
    word-break: break-word;
  }
  #frame .content .messages ul li.sent p{
    word-break: break-word;
  }
  
  </style>
@endsection
@section('chatent')
  @if (Auth::check())
    <div id="frame">
    	<div id="sidepanel">
    		<div id="profile">
    			<div class="wrap">
    				<img id="profile-img" src="{{ url(Auth::user()->foto) }}" class="online" alt="" />
    				<p>{{ Auth::user()->name }}</p>

    				<div id="status-options">
    					<ul>
                <li id="status-online" class="active"><span class="status-circle"></span> <p>Disponible</p></li>
    						<li id="status-away" class=""><span class="status-circle"></span> <p>Ocupado</p></li>
    						<li id="status-busy" class=""><span class="status-circle"></span> <p>En reunión</p></li>
    						<li id="status-offline" class=""><span class="status-circle"></span> <p>Desconectado</p></li>
    					</ul>
    				</div>

    			</div>
    		</div>
    		<div id="search">
    			<input type="text" placeholder="Buscar..." id="buscador" />
    		</div>
    		<div id="contacts" style="line-height: 0.8rem;">
    			<ul>
            @foreach ($users as $user)
              <a href="{{ action('ChatController@show', $user->id) }}" style="text-decoration: none; color: black;">
                <ul class="nombres">
                      <li class="contact">
                        <div class="wrap">
                          <span class="contact-status {{ $user->estado }}"></span>
                          <img src="{{ url($user->foto) }}" alt="" />
                          <div class="meta">
                            <p class="name">{{ $user->name }}</p>
                            <p class="preview">{{ $user->ult_mensaje }}</p>
                          </div>
                        </div>
                      </li>
          			</ul>
              </a>
          @endforeach
    			</ul>
    		</div>

    	</div> <!-- End Side Panel -->

    	<div class="content" style="background-image: url({{ asset('images/chat/opcion4.png') }}); background-size: cover;">

          <div class="contact-profile">
            <img src="{{ asset($usuario->foto) }}" alt="" />
            <p>{{ $usuario->name }}</p>
          </div>


    		<div class="messages" HTTP-EQUIV="REFRESH" CONTENT="5">
    			<ul>

            @foreach ($messages as $message)
              @if ($message->user_envia_id == Auth::user()->id && $message->user_recibe_id == $usuario->id)
                <li class="replies">
        					<img src="{{ asset(Auth::user()->foto) }}" alt="" />
        					<p>{{ str_replace(chr(10),"<br>",$message->mensaje) }}</p>
        				</li>
              @endif
              @if ($message->user_recibe_id == Auth::user()->id && $message->user_envia_id == $usuario->id)
                <li class="sent">
                  <img src="{{ asset($usuario->foto) }}" alt="" />
                  <p>{{ str_replace(chr(10),"<br>",$message->mensaje) }}</p>
                </li>
              @endif
            @endforeach

    			</ul>
    		</div>

    		<div class="message-input">
    			<div class="wrap">
            <form class="" action="{{ route('chats.store') }}" method="POST" id="form-chat">
              {{ csrf_field() }}
              <input type="hidden" name="user_recibe" value="{{ $usuario->id }}">
              <input type="hidden" name="user_envia" value="{{ Auth::user()->id }}">
              <input type="hidden" name="user_envia_name" value="{{ Auth::user()->name }}">
              <input type="text" placeholder=" Escriba su mensaje..." name="mensaje" value="" id="input-loco" required tabindex="1" autocomplete="off" autofocus/>
            </form>
    			</div>
    		</div>
    	</div>

    </div>

    <div id="traigoData"></div>
  @endif
@endsection
@section('scripts')
  <script>
  $(document).ready(function(){
    $('#buscador').keyup(function(){
       var nombres = $('.nombres');
       var buscandox = $(this).val();
       var buscando = buscandox.toLowerCase();
       var item='';
       for( var i = 0; i < nombres.length; i++ ){
           item = $(nombres[i]).html().toLowerCase();
           item = item.replace(new RegExp(/\s/g),"");
           item = item.replace(new RegExp(/[Aàáâãäå]/g),"a");
           item = item.replace(new RegExp(/[Eèéêë]/g),"e");
           item = item.replace(new RegExp(/[Iìíîï]/g),"i");
           item = item.replace(new RegExp(/ñ/g),"n");
           item = item.replace(new RegExp(/[Oòóôõö]/g),"o");
           item = item.replace(new RegExp(/[Uùúûü]/g),"u");
            for(var x = 0; x < item.length; x++ ){
                if( buscando.length == 0 || item.indexOf( buscando ) > -1 ){
                    $(nombres[i]).parents('a').show();
                }else{
                     $(nombres[i]).parents('a').hide();
                }
            }
       }
    });
  });
  
  </script>
  <script>
   $(document).keypress(function(e) {
     var input = $("#input-loco").val();
    
});
  </script>
@endsection
