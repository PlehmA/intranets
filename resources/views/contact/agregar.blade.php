@extends('contact.app')
@section('content')
  @if (Auth::check())
  <div class="container">
    <div class="col s6">
      <form class="" action="index.html" method="post">
        <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
          <label for="icon_prefix2">First Name</label>
        </div>
      </div>
      </form>
    </div>
    <div class="container">
      <div class="offset-s6 col s6">
        <a href="index"></a>
      </div>
    </div>
  </div>
  @endif
@endsection
