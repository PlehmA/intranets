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
    		<div id="contacts">
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
    		</div>

    	</div> <!-- End Side Panel -->


    </div>
  @endif
@endsection
