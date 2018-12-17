@extends('layouts.app') 
@section('css')
    <style>
    .content{
        margin-top: 8vh;
    }
    .alert{
        background-color: lightgray;
    }
    select {
    display: initial;
}
.miniImagen{
    height: 7vh;
    width: 7vh;
}
    </style>
@endsection
@section('content')
<div class="container">
        @if (session('success'))
                <div class="alert alert-success center-align">
                    {{ session('success') }}
                </div>
            @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
    <button class="btn grey right" onclick="location.href='{{ route('noticia.index') }}'">Volver</button>
        <div class="col-sm-12 col-md-6 col-md-offset-2 col-lg-6 col-lg-offset-2">
                {!! Form::open(['route' => 'files.store', 'files' => true, 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
                    @csrf
                    @if ($errors->any())
                    <div class="alert animated fadeIn">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="input-field col s6">
                    <input id="nomImagen" type="text" class="validate" name="nomImagen">
                    <label for="nomImagen">Nombre de la imagen</label>
                  </div>
                    <div class="row">
                            <div class="file-field input-field col-md-10">
                                    <div class="btn grey">
                                      <span>Archivo</span>
                                      <input type="file" multiple class="archivo" name="archivo[]" id="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" placeholder="Sube uno o mas archivos" readonly>
                                    </div>
                                  </div>
                                  <div class="col-md-2" style="margin-top: 2vh;">
                                            <button class="boton btn btn-small grey" disabled="disabled">Subir</button>
                                    </div>        
                    </div> 
                
                {!! Form::close() !!}
                </div>
                <div id="imagePreview"></div>
            </div>
<div class="col s12 m3 l3 xl3">
    <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Miniatura</th>
                    <th>Nombre</th>
                    <th>URL</th>
                    <th>Tamaño</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($archivos as $archivo)
            <tr>
                <td>
                    {{ $archivo->id }}
                </td>
                <td>
                    <img src="storage/{{ $archivo->nombre }}" alt="" class="miniImagen">
                </td>
                <td>
                    <p class="nimagen">{{ $archivo->nomImagen }}</p>
                </td>
                <td>
                    <a href="{{ $archivo->url }}">{{ $archivo->url }}</a>
                </td>
                <td>
                    {{ round(($archivo->tamanio / 1048576), 2) }} MB 
                </td>
                <td>
                    
                <a href="{{ route('files.edit', $archivo->id) }}" class="btn grey modal-trigger btneditar"><i class="fas fa-pencil-alt"></i></a>
                </td>
                <td>
                    <button class="btn grey btncopy copiar" data-clipboard-text="{{ $archivo->url }}" title="Copiar enlace">
                        <i class="fas fa-clipboard"></i>
                        </button>
                </td>
                <td>
                        {!! Form::open(['route' => ['files.destroy', $archivo->id], 'method' => 'DELETE']) !!}
                        <button type="submit" class="btn grey"><i class="far fa-trash-alt"></i></button>
                      {!! Form::close() !!}
                </td>
            </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Miniatura</th>
                    <th>URL</th>
                    <th>Tamaño</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </tfoot>
        </table>
 
        {{-- <div id="modal1" class="modal modal-fixed-footer">
                <div class="modal-content">
                  <h4>Panel de edición</h4>
                  <hr>
                  {!! Form::open(['url' => 'foo/bar', 'method' => 'PUT']) !!}
                  <div class="input-field col-md-6">
                        <input id="nombreurl" type="text" class="validate" name="nombreurl" value="{{ $archivo->nomImagen }}">
                        <label for="nombreurl">Nombre</label>
                      </div>
                  
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                </div>
              </div> --}}
</div>

@endsection
@section('javascript')

<script>
    tippy('.editar');
    tippy('.eliminar');
    tippy('.noticia');
    tippy('.copiar');
</script>
<script>
  $(".archivo").change(function(){
        $(".boton").prop("disabled", this.files.length == 0);
    });
</script>
<script>
$(document).ready(function () {
    $('.alert').click(function (e) { 
        e.preventDefault();
        $('.alert').hide();
    });
});
</script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        "order": [[ 0, "desc" ]],
        "language": {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
    });
} );
</script>
<script src="{{ asset('js/clipboard.min.js') }}"></script>
<script>
        var clipboard = new ClipboardJS('.btncopy');
            clipboard.on('success', function(e) {
                console.log(e);
            });
            clipboard.on('error', function(e) {
                console.log(e);
            });
</script>
{{-- <script>
$(document).ready(function(){
    $('.btneditar').click(function (e) { 
        e.preventDefault();
        var td = $(this).parents('td');
        var tr = td.parents('tr');
        var capsula = tr.children('td')
        var nombre = capsula.children('p');
        var texto = nombre.text();
        console.log(texto);
       // $('.modal').modal();
    });

});
    
</script> --}}
@endsection