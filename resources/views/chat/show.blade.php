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

    	<div class="content">

          <div class="contact-profile">
            <img src="{{ asset($usuario->foto) }}" alt="" />
            <p>{{ $usuario->name }}</p>
          </div>


    		<div class="messages">
    			<ul>
            @foreach ($iterable as $key)
              <li class="sent">
      					<img src="{{ asset($usuario->foto) }}" alt="" />
      					<p></p>
      				</li>
            @endforeach
            @foreach ($iterable as $key)
              <li class="replies">
      					<img src="{{ asset('storage/'.Auth::user()->username.'.jpg') }}" alt="" />
      					<p></p>
      				</li>
            @endforeach
    			</ul>

    		</div>

    		<div class="message-input">
    			<div class="wrap">
            <form class="" action="" method="POST">
              <input type="hidden" name="" value="">
              <input type="hidden" name="" value="">
              <input type="text" placeholder="Write your message..." />
        			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </form>
    			</div>
    		</div>
    	</div>

    </div>
    <center><a href="{{ route('chats.index') }}" class="btn teal center-align">VOLVER</a></center>
  @endif
@endsection
