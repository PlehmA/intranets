<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
        <div class="row">
                <div class="col-sm-4 offset-sm-6">
                    <img src="{{ asset('images/logoodonto.png') }}" alt="logo">
                </div>
            </div>
            <div class="row">
                    <div class="col-sm-4 offset-sm-8 mt-3">
                        <p>Buenos Aires {{ date_format($date = date_create($data->fecha_creacion), 'd/m/Y') }}</p>
                    </div>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <p style="margin-bottom: 0px;">Sres. <b>Odontopraxis Americana S.A.</b></p>
                            <p>Departamento de Recursos Humanos.</p>
                            
                        </div>
                    </div>
            
            <div class="row">
                    <div class="col-sm-12">
                        <p style="margin-top: 50px;">Por la presente le expreso mi deseo de ejercitar el derecho a los días de permiso retribuido por días de estudio.</p>
                        <p style="margin-top: 0px;">Por todo ello solicito permiso para ausentarme de mi puesto de trabajo durante los días {{ date_format($date2 = date_create($data->de), 'd/m/Y') }} hasta {{ date_format($date3 = date_create($data->hasta), 'd/m/Y') }} inclusive, 
                        lo cual comunico con la suficiente antelación al efecto de causar el menor trastorno en la planificación del trabajo de la empresa.</p>
                    </div>
                </div>
            <div class="row">
                <div class="col-sm-4">
                    <p style="margin-top: 120px;">FIRMA DEL RESPONSABLE</p>
                </div>
                
                <div class="col-sm-4 offset-sm-8">
                        <p style="margin-top: 120px;">FIRMA DEL EMPLEADO</p>
                        <p></p>
                        <p></p>
                        <p></p>
                        <br>
                        <p style="margin-top: 120px;">ACLARACIÓN</p>
                    </div>
                    
            </div>
</body>
</html>