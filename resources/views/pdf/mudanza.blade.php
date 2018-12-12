<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <style>
    .firma_employed p{
        font-size: 14px;
        margin-bottom: 0px;
    }
    .firma_employed{
       margin-left: 50px;
       margin-top: 20px;
    }
    h3{
        text-align: center;
    }
    </style>
        <div class="row">
                
                <div class="firma_employed">
                    <p>{{ $data->nombre_usuario }}</p>
                    <p>Cuil: {{ $data->cuil }}</p>
                    <p>N° Legajo: {{ $data->legajo }}</p>
                </div>
                <div class="col-sm-4 offset-sm-6">
                    <img src="http://test.odontopraxis.com.ar/entidades/images/logoodonto.png">
                </div>
            </div>
            <div class="row">
                    <div class="col-sm-4 offset-sm-8 mt-0">
                        <p>Buenos Aires {{ date_format($date = date_create($data->fecha_creacion), 'd/m/Y') }}</p>
                    </div>
                </div>
               
                <div class="row">
                        <div class="col-sm-12 mt-0">
                            <h3>Cambio y/o actualización de domicilio</h3>
                        </div>
                    </div>
            
            <div class="row">
                    <div class="col-sm-12">
                        <p style="margin-top: 50px;">Por medio de la presente el/la que suscribe {{ $data->nombre_usuario }} deja constancia del cambio de domicilio particular informado anteriormente</p>
                        <p style="margin-top: 0px;">El nuevo domicilio a partir del día {{ date_format($date2 = date_create($data->de), 'd/m/Y') }} es el siguiente:</p>
                    </div>
                   
                </div>
                <div class="row">
                        <div class="col-sm-12">
                                <p>Calle: <b>{{ $data->calle }}</b> &nbsp; N°: <b>{{ $data->numero }}</b> &nbsp; Piso: <b>{{ $data->piso }}</b> &nbsp; Dpto: <b>{{ $data->depto }}</b> C.P: <b>{{ $data->cod_postal }}</b></p>
                                <p>Entre calles: <b>{{ $data->entrecalles }}</b></p>
                                <p>Localidad: <b>{{ $data->localidad }}</b> &nbsp;    Provincia: <b>{{ $data->provincia }}</b> &nbsp; Tel: <b>{{ $data->telefono }}</b></p>
                            </div>
                </div>
            
    
   

</body>
</html>