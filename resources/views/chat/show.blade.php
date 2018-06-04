@extends('chat.app')
@section('style')
  <style media="screen">
  .contacts:hover {
    background-color: #e3e3e3;
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
    			<input type="text" placeholder="Buscar..." />
    		</div>
    		<div id="contacts" style="line-height: 0.8rem;">
    			<ul>
            @foreach ($users as $user)
              <a href="{{ action('ChatController@show', $user->id) }}" style="text-decoration: none; color: black;">
                <ul>
                      <li class="contact">
                        <div class="wrap">
                          <span class="contact-status {{ $user->estado }}"></span>
                          <img src="{{ url($user->foto) }}" alt="" />
                          <div class="meta">
                            <p class="name">{{ $user->name }}</p>
                            <p class="preview">You just got LITT up, Mike.</p>
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
        					<p>{{ $message->mensaje }}</p>
        				</li>
              @endif
              @if ($message->user_recibe_id == Auth::user()->id && $message->user_envia_id == $usuario->id)
                <li class="sent">
                  <img src="{{ asset($usuario->foto) }}" alt="" />
                  <p style="width: 100%">{{ $message->mensaje }}</p>
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
              <input type="text" placeholder=" Escriba su mensaje..." name="mensaje" value="" id="input-loco" required tabindex="1" autocomplete="off"/>
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
//   $(document).ready(function() {
//     function newMessage() {
//     	message = $("#input-loco").val();
//     	if($.trim(message) == '') {
//     		return false;
//     	}
//     	$('<li class="replies"><img src="{{ url(Auth::user()->foto) }}" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
//     	$('#input-loco').val(null);
//     	$('.contact.active .preview').html('<span>You: </span>' + message);
//     	$(".messages").animate({ scrollTop: $(document).height()+$(document).height()+5000 }, "fast");
//     };
//
//     $("#form-chat").submit(function() {
//       event.preventDefault();
//       var data = $(this).serialize();
//       var form = $("#form-chat");
//       var url = form.attr("action");
//
//     $.ajax({
//       url: url,
//       type: 'POST',
//       data: data
//     })
//     .done(function() {
//       newMessage();
//     })
//     .fail(function() {
//       alert('Imposible conectar al servidor');
//     })
//     .always(function() {
//       console.log("complete");
//     });
//   });
//
// var idUser = {{ $usuario->id }};
//   $.ajax({
//     url: '/intranet3/public/chats/'+idUser,
//     dataType:'json',
//   })
//   .done(function(response) {
//     $('#traigoData').html(response);
//   })
//   .fail(function(response) {
//     $('#traigoData').html(response);
//   })
//   .always(function() {
//     console.log("complete");
//   });
//
// });
</script>
@endsection
