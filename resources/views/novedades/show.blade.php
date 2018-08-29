@extends('layouts.app') 
@section('css')
<style>
.content{
            margin-top: 7vh;
        }
@media (max-width: 1400px){
    .content{
            margin-top: 12vh;
        }
}
</style>
@endsection 
@section('content')
<div class="container">
     
        <div class="row">
                <div class="col l10 offset-s1">
                  <div class="card">
                    <div class="card-image">
                            <img src="{{ asset('storage/images/'.$news->foto) }}" class="responsive-image">
                    <span class="card-title">{{ $news->titulo }}</span>
                    </div>
                    <div class="card-content">
                    <p>{{ $news->cuerpo }}</p>
                    </div>
                  </div>
                </div>
              </div>

</div>
@endsection
@section('javascript')

@endsection