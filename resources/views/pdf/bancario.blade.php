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
                            <p style="margin-bottom: 0px;">Sres. <b>Odontopraxis Americana S.A.</b></p>
                            <p>Departamento de Recursos Humanos.</p>
                            
                        </div>
                    </div>
            
            <div class="row">
                    <div class="col-sm-12">
                        <h5 style="margin-top: 50px;"><b>{{ $data->tipo_autorizacion }}</b></h5>
                        <p>Por la presente le expreso mi deseo, pidiendo permiso para ausentarme de mi puesto de trabajo el día {{ date_format($date2 = date_create($data->fecha_de), 'd/m/Y') }}.</p>
                        <p>Motivo: {{$data->motivo}}</p>
                        <p>Lo cual comunico con la suficiente antelación al efecto de causar el menor trastorno en la planificación del trabajo de la empresa.</p>

                    </div>
                </div>
          
</body>
</html>