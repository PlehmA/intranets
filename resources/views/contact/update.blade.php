@extends('contact.app')
@section('content')
  @if (Auth::check())
  <div class="container">
    <div class="col s7 right-align">
      <a href="{{ route('contact.index') }}" class="btn grey">Volver</a>
    </div>

    @if (session('success'))

      <div class="alert alert-success col-sm-7 text-center" role="alert" data-dismiss="alert"><strong>{{ session('success') }}</strong></div>

    @endif
<br>
    <div class="col s12">
      
            {!! Form::open(['method' => 'PUT','route' => ['contact.update', $contact->id]]) !!}
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s7">
            <input id="nomyap" type="text" class="validate" name="nomyap" value="{{$contact->nomyap}}">
            
          </div>
        <div class="input-field col s7">
          <input id="correo" type="text" class="validate" name="correo" value="{{$contact->correo}}">
          
        </div>
        <div class="input-field col s7">
          <input id="direccion" type="text" class="validate" name="direccion" value="{{$contact->direccion}}">
          
        </div>
        <div class="input-field col s7">
          <input id="partido" type="text" class="validate" name="partido" value="{{$contact->partido}}">
          
        </div>
        <div class="input-field col s7">
          <input id="localidad" type="text" class="validate" name="localidad" value="{{$contact->localidad}}">
          
        </div>
        <div class="input-field col s7">
          <input id="provincia" type="text" class="validate" name="provincia" value="{{$contact->provincia}}">
          
        </div>
        <div class="input-field col s7">
          <input id="tellinea" type="text" class="validate" name="tellinea" value="{{$contact->tellinea}}">
          
        </div>
        <div class="input-field col s7">
          <input id="telcel" type="text" class="validate" name="telcel" value="{{$contact->telcel}}">
         
        </div>
        <div class="input-field col s7">
          <input id="interno" type="text" class="validate" name="interno" value="{{$contact->interno}}">
          
        </div>
        <div class="col s7 right-align">
          <input type="submit" name="" value="Actualizar" class="btn pulse">
        </div>
      </div>
      {!! Form::close() !!}

    </div>

    <div class="container">
      <div class="offset-s6 col s6">
        <a href="index"></a>
      </div>
    </div>
  </div>
  @endif
@endsection
