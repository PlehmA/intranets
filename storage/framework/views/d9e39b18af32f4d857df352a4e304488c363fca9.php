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
                    <p><?php echo e($data->nombre_usuario); ?></p>
                    <p>Cuil: <?php echo e($data->cuil); ?></p>
                    <p>N° Legajo: <?php echo e($data->legajo); ?></p>
                </div>
                <div class="col-sm-4 offset-sm-6">
                    <img src="http://test.odontopraxis.com.ar/entidades/images/logoodonto.png">
                </div>
            </div>
            <div class="row">
                    <div class="col-sm-4 offset-sm-8 mt-0">
                        <p>Buenos Aires <?php echo e(date_format($date = date_create($data->fecha_creacion), 'd/m/Y')); ?></p>
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
                        <p style="margin-top: 50px;">De mi mayor consideración:</p>
                        <p style="margin-top: 0px;">    Me dirijo a ustedes a fin de solicitarles tenga a bien informarme si el Periodo Vacacional por mi solicitado es aceptado.</p>
                        <p>De: <?php echo e(date_format($date2 = date_create($data->de), 'd/m/Y')); ?>. Hasta: <?php echo e(date_format($date3 = date_create($data->hasta), 'd/m/Y')); ?> inclusive</p>
                        
                    </div>
                </div>
            
    
   

</body>
</html>