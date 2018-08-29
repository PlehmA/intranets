@extends('uichat.app')
@section('style')
<style>
#frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
    margin: 5px 0 0 0;
    padding: 0 0 1px;
    font-weight: 400;
    white-space: nowrap;
    overflow: unset;
    text-overflow: ellipsis;
    -moz-transition: 1s all ease;
    -o-transition: 1s all ease;
    -webkit-transition: 1s all ease;
    transition: 1s all ease;
}
#frame #sidepanel #contacts ul li.contact .wrap {
    width: 88%;
    margin: 0 auto;
    position: relative;
    height: 4vh;
}
</style>
@endsection
@section('chatent')
  @if (Auth::check())
  <div id="frame">
    	<div id="sidepanel">
    		<div id="profile">
    			<div class="wrap">
    				<img id="profile-img" src="{{ asset(Auth::user()->foto) }}" class="online" alt="" />
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
           
              <a href="" style="text-decoration: none; color: black;">
                <ul class="nombres">
                      <li class="contact">
                        <div class="wrap">
                          <span class="contact-status"></span>
                          <img src="" alt="" />
                          <div class="meta">
                            <p class="name"></p>
                            <p class="preview"></p>
                          </div>
                        </div>
                      </li>
          			</ul>
              </a>
         
    			</ul>
    		</div>

    	</div> <!-- End Side Panel -->

    	<div class="content" style="background-image: url({{ asset('images/chat/opcion4.png') }}); background-size: cover;">

          <div class="contact-profile">
            <img src="" alt="" />
            <p></p>
          </div>
    
    	<ul class="messages" v-chat-scroll>

            <message
            v-for="value in chat.message"
            :key=value.index
            clase='replies'
            >
            @{{value}}
            </message>
        </ul>
 
    		<div class="message-input">
    			<div class="wrap">
    
              <input type="text" placeholder=" Escriba su mensaje..." name="mensaje" value="" id="input-loco" required tabindex="1" autocomplete="off" autofocus/ 
              v-model='message' @keyup.enter='send'>
          
    			</div>
    		</div>
    	</div>

    </div>
  @endif
@endsection
@section('scripts')
<script>
</script>
@endsection
