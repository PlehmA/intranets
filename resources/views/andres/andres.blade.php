@extends('layouts.app')
@section('css')
<style>
    .main-panel {
        overflow: auto;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 9991;
        padding-top: 0;
        left: 0;
        top: 0;
        width: 50%;
        overflow: auto;
        background-color: transparent;
        box-shadow: none;

    }

    .modal-overlay {
        opacity: 0.1 !important;
    }

    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    @keyframes animatetop {
        from {
            top: -300px;
            opacity: 0
        }

        to {
            top: 0;
            opacity: 1
        }
    }

    /* The Close Button */
    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        background-color: #f7f7f7;
        color: #222222;
    }

    .modal-body {
        padding: 2px 16px;
    }

    .modal .modal-header .close {
        color: #222222;
    }

    #contenidoEvent p {
        font-size: 18px;
    }
.center-block {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.thumbnail{
    width: 50px;
    height: 50px;
    margin-bottom: 0 !important;
}
</style>
@toastr_css
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
    <div class="col-sm-12 col-md-8 col-lg-5">

        @if (session('status'))
        <div class="alert">
            {{ session('status') }}
        </div>
        @endif

        <table class="table responsive-table" id="area" data-page-length='3'>
            <thead>
                <tr>
                    <th><b>ID</b></th>
                    <th><b>Área</b></th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puestos as $puesto)

                <tr>
                    <td scope="row">{{ $puesto->id }}</td>
                    <td>{{ $puesto->nombre_puesto }}</td>
                    <td>
                        <form action="{{ route('puesto.show', $puesto->id) }}" method="get">
                            <button type="submit" data-id="{{ $puesto->id }}" data-puesto="{{ $puesto->nombre_puesto }}"
                                data-target="modalEdit" class="btn blue modal-trigger btn-edit"><i
                                    class="fas fa-edit"></i>
                            </button>
                        </form>

                    </td>
                    <td>
                        {!! Form::open(['route' => ['puesto.destroy', $puesto->id], 'method' => 'delete']) !!}
                            @csrf
                            <button type="submit" class="btn red lighten-2 btn-delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        {!! Form::close() !!}

                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-5 col-lg-offset-1">
        <div class="panel panel-warning" style="margin-top: 100px;">
            <div class="panel-heading">
                    <h3 class="panel-title">Nueva área</h3>
            </div>
            <div class="panel-body">

                {!! Form::open(['route' => 'puesto.store', 'method' => 'post']) !!}
                @csrf
                    <div class="input-field col-sm-12 col-md-8 col-md-offset-2">
                            <i class="material-icons prefix">playlist_add</i><input type="text" name="nombre_puesto">
                    </div>
                    <div class="col-sm-12 col-md-12">

                        <span class="input-group-btn center-block">
                            <button class="btn grey" type="submit" style="margin-top: 35px;">Crear</button>
                        </span>

                    </div>
                
                {!! Form::close() !!}


            </div>
        </div>

        @if (session('success'))
        <div class="alert brown lighten-4 animated fadeIn text-center">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert red lighten-3 animated fadeIn text-center">
            {{ session('error') }}
        </div>
        @endif

</div>
</div>

<div class="row">
        <div class="col-sm-12 col-md-5 col-lg-5" style="margin-top: 20px">
            <table class="table responsive-table" id="education" data-page-length='3'>
                    <thead>
                            <tr>
                                <th><b>ID</b></th>
                                <th><b>Nombre</b></th>
                                <th><b>Imagen</b></th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tutoriales as $tutorial)
            
                            <tr>
                                <td scope="row">{{ $tutorial->id }}</td>
                                <td>{{ $tutorial->name }}</td>
                                <td><img src="{{ asset('storage/'.$tutorial->image) }}" class="thumbnail"></td>
                                <td>
                                    <form action="{{ route('tutoriales/show', $tutorial->id) }}" method="get">
                                        <button type="submit" class="btn blue modal-trigger btn-edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                        {!! Form::open(['route' => ['tutoriales/delete', $tutorial->id], 'method' => 'delete']) !!}
                                        @csrf
                                        <button type="submit" class="btn red lighten-2">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        {!! Form::close() !!}
                                </td>
                            </tr>
            
                            @endforeach
                        </tbody>
            </table>
            </div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-lg-offset-1" style="margin-top: 40px">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">Creacion de tutoriales</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                
                                        {!! Form::open(['route' => 'tutoriales/subida', 'files' => true, 'method' => 'PUT']) !!}
                                            @csrf
                                            
                                            <div class="input-field col-sm-12 col-md-8 col-md-offset-2">
                                                    <i class="material-icons prefix">playlist_add</i><input type="text" name="nombreTuto">
                                            </div>
                                            <div class="col-sm-12 col-md-8 col-md-offset-2">

                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>Imagen</span>
                                                    <input type="file" name="imgPortada">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                                </div>
                                            </div>
                        
                                            <span class="input-group-btn center-block">
                                                <button class="btn grey" type="submit" style="margin-top: 35px;">Crear</button>
                                            </span>
                        
                                            </div>
                
                                        {!! Form::close() !!}
                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
   
<div class="row">
        <div class="col-sm-12 col-md-5 col-lg-5" style="margin-top: 40px">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Subida de videos</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
        
                                {!! Form::open(['route' => 'videos/store', 'files' => true, 'method' => 'POST']) !!}
                                    @csrf
                              
                                    <div class="input-field col-sm-12 col-md-12">
                                            <select class="icons">
                                                    <option value="" disabled selected>Seleccione tutorial</option>
                                                @foreach ($tutoriales as $vids)
                                            <option value="{{ $vids->id }}" data-icon="{{ asset('storage/'.$vids->image) }}">{{ $vids->name }}</option>
                                                @endforeach
                                            </select>
                                            <label>Tutorial a cual añadir videos</label>
                                    </div>

                                    <div class="input-field col-sm-12 col-md-12">
                                            <i class="material-icons prefix">video_library</i>
                                            <input id="icon_prefix" type="text">
                                            <label for="icon_prefix" style="margin-left: 4rem;">Título del video</label>
                                          </div>
                                    
                                    <div class="file-field input-field col-sm-12 col-md-12">
                                            <div class="btn">
                                                <span><i class="material-icons">ondemand_video</i></span>
                                                <input type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    <div class="col-sm-12 col-md-4 col-md-offset-3 col-lg-4 col-lg-offset-4">
                                        <button class="btn grey" type="submit">Cargar video</button>
                                    </div>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>    
</div>   
</div>

@endsection
@section('javascript')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
@toastr_js
@toastr_render
<script>
    $(document).ready(function () {
        $('select').formSelect();
    });
</script>
<script>
    $(document).ready(function () {
        $('#area').DataTable({
            "dom": 'frtip'
        });
        $('#education').DataTable({
            "dom": 'frtip'
        });
    });
</script>
<script>
$(".alert").click(function (e) { 
        e.preventDefault();
$(".alert").hide();
});
</script>
@endsection