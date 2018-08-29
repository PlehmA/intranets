@extends('layouts.app')
@section('css')
<style>

.main-panel>.content {
  padding: 0 0;
  min-height: calc(100% - 123px);
}
.content{
    margin-top: 12vh;
}
</style>
@endsection
@section('content')
  <div class="embed-container2">
    <iframe src="https://onedrive.live.com/embed?cid=894D4E5B134C5B8D&amp;resid=894D4E5B134C5B8D%21143&amp;authkey=AJpqO9dGMiNVpKk&amp;em=2&amp;wdAr=1.7777777777777777" width="1186px" height="691px" frameborder="0">Esto es un documento de <a target="_blank" href="https://office.com">Microsoft Office</a> incrustado con tecnología de <a target="_blank" href="https://office.com/webapps">Office Online</a>.</iframe>
  </div>
@endsection
@section('javascript')
<script>
  $(".main-panel").perfectScrollbar('destroy');
</script>
@endsection
