@extends('chat.app')
@section('chatent')
  @if (Auth::check())
    <div id="frame">
    	<div id="sidepanel">
    		<div id="profile">
    			<div class="wrap">
    				<img id="profile-img" src="{{ url('storage/'.Auth::user()->username.'.jpg') }}" class="online" alt="" />
    				<p>{{ Auth::user()->name }}</p>

    				<div id="status-options">
    					<ul>
    						<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
    						<li id="status-away" class=""><span class="status-circle"></span> <p>Away</p></li>
    						<li id="status-busy" class=""><span class="status-circle"></span> <p>Busy</p></li>
    						<li id="status-offline" class=""><span class="status-circle"></span> <p>Offline</p></li>
    					</ul>
    				</div>

    			</div>
    		</div>
    		<div id="search">
    			<input type="text" placeholder="Buscar..." />
    		</div>
    		<div id="contacts">
    			<ul>
            @foreach ($users as $user)
              <a href="{{ action('ChatController@show', $user->id) }}" style="text-decoration: none; color: white;">
                <ul>
                      <li class="contact">
                        <div class="wrap">
                          <span class="contact-status {{ $user->estado }}"></span>
                          <img src="{{ url('storage/'.$user->username.'.jpg') }}" alt="" />
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

    	<div class="content" style="background-image: url({{ asset('images/recurso2.png') }}); background-size: cover;">

          <div class="contact-profile">
            <img src="{{ asset($usuario->foto) }}" alt="" />
            <p>{{ $usuario->name }}</p>
          </div>


    		<div class="messages">
    			<ul>

            @foreach ($messages as $message)
              @if ($message->user_envia_id == Auth::user()->id && $message->user_recibe_id == $usuario->id)
                <li class="replies">
        					<img src="{{ asset('storage/'.Auth::user()->username.'.jpg') }}" alt="" />
        					<p>{{ $message->mensaje }}</p>
        				</li>
              @endif
              @if ($message->user_recibe_id == Auth::user()->id && $message->user_envia_id == $usuario->id)
                <li class="sent">
                  <img src="{{ asset($usuario->foto) }}" alt="" />
                  <p>{{ $message->mensaje }}</p>
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
              <input type="hidden" name="user_recibe_name" value="{{ $usuario->name }}">
              <input type="hidden" name="user_envia_name" value="{{ Auth::user()->name }}">
              <input type="text" placeholder="Write your message..." name="mensaje" value="" id="input-loco" required tabindex="1" />
            </form>
    			</div>
    		</div>
    	</div>

    </div>
  @endif
@endsection
