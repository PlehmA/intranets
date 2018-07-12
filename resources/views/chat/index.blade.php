@extends('chat.app')
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
    		<div id="contacts" style="line-height: 0.5rem;">
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
    		</div>

    	</div> <!-- End Side Panel -->
      <div class="content" style="background-image: url({{ asset('images/chatfondologo.png') }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
      </div>

    </div>
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
@endsection
