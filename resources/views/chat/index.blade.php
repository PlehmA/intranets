@extends('chat.app')
@section('chatent')
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
            <li class="contact">
              <div class="wrap">
                <span class="contact-status online"></span>
                <img src="{{ url('storage/'.$user->username.'.jpg') }}" alt="" />
                <div class="meta">
                  <p class="name">{{ $user->name }}</p>
                  <p class="preview">You just got LITT up, Mike.</p>
                </div>
              </div>
            </li>
          @endforeach

  				<li class="contact active">
  					<div class="wrap">
  						<span class="contact-status busy"></span>
  						<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
  						<div class="meta">
  							<p class="name">Harvey Specter</p>
  							<p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
  						</div>
  					</div>
  				</li>
  				<li class="contact">
  					<div class="wrap">
  						<span class="contact-status away"></span>
  						<img src="http://emilcarlsson.se/assets/rachelzane.png" alt="" />
  						<div class="meta">
  							<p class="name">Rachel Zane</p>
  							<p class="preview">I was thinking that we could have chicken tonight, sounds good?</p>
  						</div>
  					</div>
  				</li>
  				<li class="contact">
  					<div class="wrap">
  						<span class="contact-status online"></span>
  						<img src="http://emilcarlsson.se/assets/donnapaulsen.png" alt="" />
  						<div class="meta">
  							<p class="name">Donna Paulsen</p>
  							<p class="preview">Mike, I know everything! I'm Donna..</p>
  						</div>
  					</div>
  				</li>
  				<li class="contact">
  					<div class="wrap">
  						<span class="contact-status busy"></span>
  						<img src="http://emilcarlsson.se/assets/jessicapearson.png" alt="" />
  						<div class="meta">
  							<p class="name">Jessica Pearson</p>
  							<p class="preview">Have you finished the draft on the Hinsenburg deal?</p>
  						</div>
  					</div>
  				</li>
  				<li class="contact">
  					<div class="wrap">
  						<span class="contact-status"></span>
  						<img src="http://emilcarlsson.se/assets/haroldgunderson.png" alt="" />
  						<div class="meta">
  							<p class="name">Harold Gunderson</p>
  							<p class="preview">Thanks Mike! :)</p>
  						</div>
  					</div>
  				</li>
  				<li class="contact">
  					<div class="wrap">
  						<span class="contact-status"></span>
  						<img src="http://emilcarlsson.se/assets/danielhardman.png" alt="" />
  						<div class="meta">
  							<p class="name">Daniel Hardman</p>
  							<p class="preview">We'll meet again, Mike. Tell Jessica I said 'Hi'.</p>
  						</div>
  					</div>
  				</li>
  				<li class="contact">
  					<div class="wrap">
  						<span class="contact-status busy"></span>
  						<img src="http://emilcarlsson.se/assets/katrinabennett.png" alt="" />
  						<div class="meta">
  							<p class="name">Katrina Bennett</p>
  							<p class="preview">I've sent you the files for the Garrett trial.</p>
  						</div>
  					</div>
  				</li>
  			</ul>
  		</div>
  		<div id="bottom-bar">

  		</div>
  	</div> <!-- End Side Panel -->

  	<div class="content">
  		<div class="contact-profile">
  			<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
  			<p>Harvey Specter</p>
  			<div class="social-media">

  			</div>
  		</div>
  		<div class="messages">
  			<ul>
          @foreach ($recieve_message as $mensajeRecibido)
            <li class="sent">
    					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
    					<p>{{ $mensajeRecibido->mensaje }}</p>
    				</li>
          @endforeach
          @foreach ($send_message as $mensajeEnviado)
            <li class="replies">
    					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
    					<p>{{ $mensajeEnviado->mensaje }}</p>
    				</li>
          @endforeach
  			</ul>

  		</div>

  		<div class="message-input">
  			<div class="wrap">
          <form class="" action="" method="POST">
            <input type="text" placeholder="Write your message..." />
      			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
          </form>
  			</div>
  		</div>
  	</div>
  </div>

@endsection
