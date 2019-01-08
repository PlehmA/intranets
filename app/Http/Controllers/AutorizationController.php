<?php

namespace App\Http\Controllers;

use App\Autorization;
use Auth;
use App\Notify;
use App\Puesto;
use App\User;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use DateTime;
use DateInterval;
use DatePeriod;


class AutorizationController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        $autorizacionesjefe = Autorization::where('rol_usuario', Auth::user()->rol_usuario)
        ->orderBy('fecha_creacion', 'DESC')
        ->get();

        $autorirrhh = Autorization::where('estado_jefe', '<>', null)
        ->orderBy('fecha_creacion', 'DESC')
        ->get();

        $autouser = Autorization::where('user_id', Auth::user()->id)
        ->orderBy('fecha_creacion', 'DESC')
        ->get();
        //dd($autorizacionesjefe);

        $autojefatura = Autorization::where('tipo_ro', 2)->get();
       
        return view('autorizaciones.list', compact(['notificacion', 'autorizacionesjefe', 'autorirrhh', 'autouser', 'autojefatura']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('autorizaciones.index', compact(['notificacion']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request->input('opcionauto')) {
            case 1:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){
                 
                $date_1 = date_create($request->input('dematrimonio'));
                $date_2 = date_create($request->input('hastamatrimonio'));
                if ($date_1 > $date_2) return FALSE;
                $bussiness_days = array();
                while ($date_1 <= $date_2) {
                    $day_week = $date_1->format('w');
                    if ($day_week > 0 && $day_week < 7) {
                        $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                    }
                    date_add($date_1, date_interval_create_from_date_string('1 day'));
                }
                if (strtolower('array') === 'sum') {
                    array_map(function($k) use(&$bussiness_days) {
                        $bussiness_days[$k] = count($bussiness_days[$k]);
                    }, array_keys($bussiness_days));
                }
                $array_dias = [];
                foreach($bussiness_days as $loco){
                   $volador = count($loco);
                }
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
                
                $autorization = Autorization::create([
                    'tipo_ro'  =>  Auth::user()->tipo_rol,
                    'nombre_usuario'    =>  Auth::user()->name,
                    'user_id'           =>  Auth::user()->id,
                    'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                    'tipo_autorizacion' =>  'Licencia por matrimonio',
                    'rol_usuario'       =>  Auth::user()->rol_usuario,
                    'sector'            =>  $puesto->nombre_puesto,
                    'autorizacion_id'   =>  $request->input('opcionauto'),
                    'fecha_de'          =>  $request->input('dematrimonio'),
                    'fecha_hasta'       =>  $request->input('hastamatrimonio'),
                    'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                    'dias_count'        => $volador
                ]);
                $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    
                    //Server settings                            // Enable verbose debug output
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                    $mail->Password = 'Newsist2018';           // SMTP password
                    $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 25;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');

                    $mail->addAddress($jefe->email);     // Add a recipient
          
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Tiene una nueva gestion pendiente!';
                    $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
          
                    $mail->send();
                return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
                } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            } ##//CATCH
           }elseif (2 == Auth::user()->tipo_rol){

            $date_1 = date_create($request->input('dematrimonio'));
            $date_2 = date_create($request->input('hastamatrimonio'));
            if ($date_1 > $date_2) return FALSE;
            $bussiness_days = array();
            while ($date_1 <= $date_2) {
                $day_week = $date_1->format('w');
                if ($day_week > 0 && $day_week < 7) {
                    $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                }
                date_add($date_1, date_interval_create_from_date_string('1 day'));
            }
            if (strtolower('array') === 'sum') {
                array_map(function($k) use(&$bussiness_days) {
                    $bussiness_days[$k] = count($bussiness_days[$k]);
                }, array_keys($bussiness_days));
            }
            $array_dias = [];
            foreach($bussiness_days as $loco){
               $volador = count($loco);
            }

                $autorization = Autorization::create([
                    'tipo_ro'  =>  Auth::user()->tipo_rol,
                    'nombre_usuario'    =>  Auth::user()->name,
                    'user_id'           =>  Auth::user()->id,
                    'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                    'tipo_autorizacion' =>  'Licencia por matrimonio',
                    'rol_usuario'       =>  Auth::user()->rol_usuario,
                    'sector'            =>  $puesto->nombre_puesto,
                    'autorizacion_id'   =>  $request->input('opcionauto'),
                    'dias_count'        =>  $volador,
                    'fecha_de'          =>  $request->input('dematrimonio'),
                    'fecha_hasta'       =>  $request->input('hastamatrimonio'),
                    'fecha_creacion'    =>  date('Y-m-d H:i:s')
                ]);

            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

           }else {
            $date_1 = date_create($request->input('dematrimonio'));
            $date_2 = date_create($request->input('hastamatrimonio'));
            if ($date_1 > $date_2) return FALSE;
            $bussiness_days = array();
            while ($date_1 <= $date_2) {
                $day_week = $date_1->format('w');
                if ($day_week > 0 && $day_week < 7) {
                    $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                }
                date_add($date_1, date_interval_create_from_date_string('1 day'));
            }
            if (strtolower('array') === 'sum') {
                array_map(function($k) use(&$bussiness_days) {
                    $bussiness_days[$k] = count($bussiness_days[$k]);
                }, array_keys($bussiness_days));
            }
            $array_dias = [];
            foreach($bussiness_days as $loco){
               $volador = count($loco);
            }
            $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
                
            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Licencia por matrimonio',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('dematrimonio'),
                'fecha_hasta'       =>  $request->input('hastamatrimonio'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador
            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');

                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
           }
                break;
            case 2:
            $puesto = Puesto::find(Auth::user()->rol_usuario);

            if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){
                
                $date_1 = date_create($request->input('dehijos'));
                $date_2 = date_create($request->input('hastahijos'));
                if ($date_1 > $date_2) return FALSE;
                $bussiness_days = array();
                while ($date_1 <= $date_2) {
                    $day_week = $date_1->format('w');
                    if ($day_week > 0 && $day_week < 7) {
                        $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                    }
                    date_add($date_1, date_interval_create_from_date_string('1 day'));
                }
                if (strtolower('array') === 'sum') {
                    array_map(function($k) use(&$bussiness_days) {
                        $bussiness_days[$k] = count($bussiness_days[$k]);
                    }, array_keys($bussiness_days));
                }
                $array_dias = [];
                foreach($bussiness_days as $loco){
                   $volador = count($loco);
                }

            $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();

            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Licencia por nacimiento de hijo',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('dehijos'),
                'fecha_hasta'       =>  $request->input('hastahijos'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador
            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
      
                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   
    }elseif (2 == Auth::user()->tipo_rol){
        $date_1 = date_create($request->input('dehijos'));
        $date_2 = date_create($request->input('hastahijos'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Licencia por nacimiento de hijo',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'dias_count'        =>  $volador,
                'fecha_de'          =>  $request->input('dehijos'),
                'fecha_hasta'       =>  $request->input('hastahijos'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

       }else {
        $date_1 = date_create($request->input('dehijos'));
        $date_2 = date_create($request->input('hastahijos'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }
        $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
        $autorization = Autorization::create([
            'tipo_ro'  =>  Auth::user()->tipo_rol,
            'nombre_usuario'    =>  Auth::user()->name,
            'user_id'           =>  Auth::user()->id,
            'legajo'            =>  Auth::user()->num_legajo,
            'cuil'              =>  Auth::user()->cuil,
            'tipo_autorizacion' =>  'Licencia por nacimiento de hijo',
            'rol_usuario'       =>  Auth::user()->rol_usuario,
            'sector'            =>  $puesto->nombre_puesto,
            'autorizacion_id'   =>  $request->input('opcionauto'),
            'fecha_de'          =>  $request->input('dehijos'),
            'fecha_hasta'       =>  $request->input('hastahijos'),
            'fecha_creacion'    =>  date('Y-m-d H:i:s'),
            'dias_count'        =>  $volador
        
        ]);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            
            //Server settings                            // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
            $mail->Password = 'Newsist2018';           // SMTP password
            $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to
  
            //Recipients
            $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
  
            $mail->addAddress($jefe->email);     // Add a recipient
  
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tiene una nueva gestion pendiente!';
            $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
  
            $mail->send();
        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }   
       }
                break;
            case 3:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){

                $date_1 = date_create($request->input('decasahijos'));
                $date_2 = date_create($request->input('hastacasahijos'));
                if ($date_1 > $date_2) return FALSE;
                $bussiness_days = array();
                while ($date_1 <= $date_2) {
                    $day_week = $date_1->format('w');
                    if ($day_week > 0 && $day_week < 7) {
                        $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                    }
                    date_add($date_1, date_interval_create_from_date_string('1 day'));
                }
                if (strtolower('array') === 'sum') {
                    array_map(function($k) use(&$bussiness_days) {
                        $bussiness_days[$k] = count($bussiness_days[$k]);
                    }, array_keys($bussiness_days));
                }
                $array_dias = [];
                foreach($bussiness_days as $loco){
                   $volador = count($loco);
                }
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Licencia por casamiento de hijo/s',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('decasahijos'),
                'fecha_hasta'       =>  $request->input('hastacasahijos'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador

            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
      
                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   
    }elseif (2 == Auth::user()->tipo_rol){

        $date_1 = date_create($request->input('decasahijos'));
        $date_2 = date_create($request->input('hastacasahijos'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Licencia por casamiento de hijo/s',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'dias_count'        =>  $volador,
                'fecha_de'          =>  $request->input('decasahijos'),
                'fecha_hasta'       =>  $request->input('hastacasahijos'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

       }else {

        $date_1 = date_create($request->input('decasahijos'));
        $date_2 = date_create($request->input('hastacasahijos'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

        $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
        $autorization = Autorization::create([
            'tipo_ro'  =>  Auth::user()->tipo_rol,
            'nombre_usuario'    =>  Auth::user()->name,
            'user_id'           =>  Auth::user()->id,
            'legajo'            =>  Auth::user()->num_legajo,
            'cuil'              =>  Auth::user()->cuil,
            'tipo_autorizacion' =>  'Licencia por casamiento de hijo/s',
            'rol_usuario'       =>  Auth::user()->rol_usuario,
            'sector'            =>  $puesto->nombre_puesto,
            'autorizacion_id'   =>  $request->input('opcionauto'),
            'fecha_de'          =>  $request->input('decasahijos'),
            'fecha_hasta'       =>  $request->input('hastacasahijos'),
            'fecha_creacion'    =>  date('Y-m-d H:i:s'),
            'estado_jefe'       =>  true,
            'dias_count'        =>  $volador
        ]);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            
            //Server settings                            // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
            $mail->Password = 'Newsist2018';           // SMTP password
            $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to
  
            //Recipients
            $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
  
            $mail->addAddress($jefe->email);     // Add a recipient
  
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tiene una nueva gestion pendiente!';
            $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
  
            $mail->send();
        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }   
       }

                break;
            case 4:
            
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){

                $date_1 = date_create($request->input('demudanza'));
                $date_2 = date_create($request->input('hastamudanza'));
                if ($date_1 > $date_2) return FALSE;
                $bussiness_days = array();
                while ($date_1 <= $date_2) {
                    $day_week = $date_1->format('w');
                    if ($day_week > 0 && $day_week < 7) {
                        $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                    }
                    date_add($date_1, date_interval_create_from_date_string('1 day'));
                }
                if (strtolower('array') === 'sum') {
                    array_map(function($k) use(&$bussiness_days) {
                        $bussiness_days[$k] = count($bussiness_days[$k]);
                    }, array_keys($bussiness_days));
                }
                $array_dias = [];
                foreach($bussiness_days as $loco){
                   $volador = count($loco);
                }
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Licencia por mudanza',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('demudanza'),
                'fecha_hasta'       =>  $request->input('hastamudanza'),
                'calle'             =>  $request->input('calle'),
                'numero'            =>  $request->input('numero'),
                'piso'              =>  $request->input('piso'),
                'depto'             =>  $request->input('depto'),
                'cod_postal'        =>  $request->input('cod_postal'),
                'entrecalles'       =>  $request->input('entrecalles'),
                'localidad'         =>  $request->input('localidad'),
                'provincia'         =>  $request->input('provincia'),
                'telefono'          =>  $request->input('telefono'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador
            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
      
                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   
    }elseif(2 == Auth::user()->tipo_rol){

        $date_1 = date_create($request->input('demudanza'));
        $date_2 = date_create($request->input('hastamudanza'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Licencia por mudanza',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'dias_count'        =>  $volador,
                'fecha_de'          =>  $request->input('demudanza'),
                'fecha_hasta'       =>  $request->input('hastamudanza'),
                'calle'             =>  $request->input('calle'),
                'numero'            =>  $request->input('numero'),
                'piso'              =>  $request->input('piso'),
                'depto'             =>  $request->input('depto'),
                'cod_postal'        =>  $request->input('cod_postal'),
                'entrecalles'       =>  $request->input('entrecalles'),
                'localidad'         =>  $request->input('localidad'),
                'provincia'         =>  $request->input('provincia'),
                'telefono'          =>  $request->input('telefono'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

       }else {

        $date_1 = date_create($request->input('demudanza'));
        $date_2 = date_create($request->input('hastamudanza'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

        $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
        $autorization = Autorization::create([
            'tipo_ro'  =>  Auth::user()->tipo_rol,
            'nombre_usuario'    =>  Auth::user()->name,
            'user_id'           =>  Auth::user()->id,
            'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
            'tipo_autorizacion' =>  'Licencia por mudanza',
            'rol_usuario'       =>  Auth::user()->rol_usuario,
            'sector'            =>  $puesto->nombre_puesto,
            'autorizacion_id'   =>  $request->input('opcionauto'),
            'fecha_de'          =>  $request->input('demudanza'),
            'fecha_hasta'       =>  $request->input('hastamudanza'),
            'calle'             =>  $request->input('calle'),
            'numero'            =>  $request->input('numero'),
            'piso'              =>  $request->input('piso'),
            'depto'             =>  $request->input('depto'),
            'cod_postal'        =>  $request->input('cod_postal'),
            'entrecalles'       =>  $request->input('entrecalles'),
            'localidad'         =>  $request->input('localidad'),
            'provincia'         =>  $request->input('provincia'),
            'telefono'          =>  $request->input('telefono'),
            'fecha_creacion'    =>  date('Y-m-d H:i:s'),
            'estado_jefe'       =>  true,
            'dias_count'        =>  $volador
        ]);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            
            //Server settings                            // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
            $mail->Password = 'Newsist2018';           // SMTP password
            $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to
  
            //Recipients
            $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
  
            $mail->addAddress($jefe->email);     // Add a recipient
  
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tiene una nueva gestion pendiente!';
            $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
  
            $mail->send();
        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
       }
                break;
            case 5:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){

                $date_1 = date_create($request->input('deenffamiliar'));
                $date_2 = date_create($request->input('hastaenffamiliar'));
                if ($date_1 > $date_2) return FALSE;
                $bussiness_days = array();
                while ($date_1 <= $date_2) {
                    $day_week = $date_1->format('w');
                    if ($day_week > 0 && $day_week < 7) {
                        $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                    }
                    date_add($date_1, date_interval_create_from_date_string('1 day'));
                }
                if (strtolower('array') === 'sum') {
                    array_map(function($k) use(&$bussiness_days) {
                        $bussiness_days[$k] = count($bussiness_days[$k]);
                    }, array_keys($bussiness_days));
                }
                $array_dias = [];
                foreach($bussiness_days as $loco){
                   $volador = count($loco);
                }
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Licencia por enfermedad del familiar',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('deenffamiliar'),
                'fecha_hasta'       =>  $request->input('hastaenffamiliar'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador
            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
      
                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   
    }elseif (2 == Auth::user()->tipo_rol){

        $date_1 = date_create($request->input('deenffamiliar'));
        $date_2 = date_create($request->input('hastaenffamiliar'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Licencia por enfermedad del familiar',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'dias_count'        =>  $volador,
                'fecha_de'          =>  $request->input('deenffamiliar'),
                'fecha_hasta'       =>  $request->input('hastaenffamiliar'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

       }else {

        $date_1 = date_create($request->input('deenffamiliar'));
        $date_2 = date_create($request->input('hastaenffamiliar'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

        $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
        $autorization = Autorization::create([
            'tipo_ro'  =>  Auth::user()->tipo_rol,
            'nombre_usuario'    =>  Auth::user()->name,
            'user_id'           =>  Auth::user()->id,
            'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
            'tipo_autorizacion' =>  'Licencia por enfermedad del familiar',
            'rol_usuario'       =>  Auth::user()->rol_usuario,
            'sector'            =>  $puesto->nombre_puesto,
            'autorizacion_id'   =>  $request->input('opcionauto'),
            'fecha_de'          =>  $request->input('deenffamiliar'),
            'fecha_hasta'       =>  $request->input('hastaenffamiliar'),
            'fecha_creacion'    =>  date('Y-m-d H:i:s'),
            'estado_jefe'       =>  true,
            'dias_count'        =>  $volador
        ]);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            
            //Server settings                            // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
            $mail->Password = 'Newsist2018';           // SMTP password
            $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to
  
            //Recipients
            $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
  
            $mail->addAddress($jefe->email);     // Add a recipient
  
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tiene una nueva gestion pendiente!';
            $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
  
            $mail->send();
        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
       }
                break;
            case 6:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){
            
                $date_1 = date_create($request->input('delicexamen'));
                $date_2 = date_create($request->input('hastalicexamen'));
                if ($date_1 > $date_2) return FALSE;
                $bussiness_days = array();
                while ($date_1 <= $date_2) {
                    $day_week = $date_1->format('w');
                    if ($day_week > 0 && $day_week < 7) {
                        $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                    }
                    date_add($date_1, date_interval_create_from_date_string('1 day'));
                }
                if (strtolower('array') === 'sum') {
                    array_map(function($k) use(&$bussiness_days) {
                        $bussiness_days[$k] = count($bussiness_days[$k]);
                    }, array_keys($bussiness_days));
                }
                $array_dias = [];
                foreach($bussiness_days as $loco){
                   $volador = count($loco);
                }

                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Licencia por exámen/días de estudio',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'materia'           =>  $request->input('materia'),
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('delicexamen'),
                'fecha_hasta'       =>  $request->input('hastalicexamen'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador
            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
      
                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   
    }elseif (2 == Auth::user()->tipo_rol){

        $date_1 = date_create($request->input('delicexamen'));
        $date_2 = date_create($request->input('hastalicexamen'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Licencia por exámen/días de estudio',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'materia'           =>  $request->input('materia'),
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'dias_count'        =>  $volador,
                'fecha_de'          =>  $request->input('delicexamen'),
                'fecha_hasta'       =>  $request->input('hastalicexamen'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),

            ]);

        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

       }else {

        $date_1 = date_create($request->input('delicexamen'));
        $date_2 = date_create($request->input('hastalicexamen'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

        $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();

        $autorization = Autorization::create([
            'tipo_ro'  =>  Auth::user()->tipo_rol,
            'nombre_usuario'    =>  Auth::user()->name,
            'user_id'           =>  Auth::user()->id,
            'legajo'            =>  Auth::user()->num_legajo,
            'cuil'              =>  Auth::user()->cuil,
            'tipo_autorizacion' =>  'Licencia por exámen/días de estudio',
            'rol_usuario'       =>  Auth::user()->rol_usuario,
            'materia'           =>  $request->input('materia'),
            'sector'            =>  $puesto->nombre_puesto,
            'autorizacion_id'   =>  $request->input('opcionauto'),
            'fecha_de'          =>  $request->input('delicexamen'),
            'fecha_hasta'       =>  $request->input('hastalicexamen'),
            'fecha_creacion'    =>  date('Y-m-d H:i:s'),
            'estado_jefe'       =>  true,
            'dias_count'        =>  $volador
        ]);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            
            //Server settings                            // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
            $mail->Password = 'Newsist2018';           // SMTP password
            $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to
  
            //Recipients
            $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
  
            $mail->addAddress($jefe->email);     // Add a recipient
  
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tiene una nueva gestion pendiente!';
            $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
  
            $mail->send();
        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
       }
                break;
            case 7:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){

                $date_1 = date_create($request->input('depemestudio'));
                $date_2 = date_create($request->input('hastapemestudio'));
                if ($date_1 > $date_2) return FALSE;
                $bussiness_days = array();
                while ($date_1 <= $date_2) {
                    $day_week = $date_1->format('w');
                    if ($day_week > 0 && $day_week < 7) {
                        $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                    }
                    date_add($date_1, date_interval_create_from_date_string('1 day'));
                }
                if (strtolower('array') === 'sum') {
                    array_map(function($k) use(&$bussiness_days) {
                        $bussiness_days[$k] = count($bussiness_days[$k]);
                    }, array_keys($bussiness_days));
                }
                $array_dias = [];
                foreach($bussiness_days as $loco){
                   $volador = count($loco);
                }

            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Estudio médico',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('depemestudio'),
                'fecha_hasta'       =>  $request->input('depemestudio'),
                'hora_de'           =>  $request->input('hastapemestudio'),
                'hora_hasta'        =>  $request->input('hastapemestudio'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador
            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
      
                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   
    }elseif (2 == Auth::user()->tipo_rol){

        $date_1 = date_create($request->input('depemestudio'));
        $date_2 = date_create($request->input('hastapemestudio'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }


            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Estudio médico',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'dias_count'        =>  $volador,
                'fecha_de'          =>  $request->input('depemestudio'),
                'fecha_hasta'       =>  $request->input('depemestudio'),
                'hora_de'           =>  $request->input('hastapemestudio'),
                'hora_hasta'        =>  $request->input('hastapemestudio'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

       }else {

        $date_1 = date_create($request->input('depemestudio'));
        $date_2 = date_create($request->input('hastapemestudio'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }


        $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
        $autorization = Autorization::create([
            'tipo_ro'  =>  Auth::user()->tipo_rol,
            'nombre_usuario'    =>  Auth::user()->name,
            'user_id'           =>  Auth::user()->id,
            'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
            'tipo_autorizacion' =>  'Estudio médico',
            'rol_usuario'       =>  Auth::user()->rol_usuario,
            'sector'            =>  $puesto->nombre_puesto,
            'autorizacion_id'   =>  $request->input('opcionauto'),
            'fecha_de'          =>  $request->input('depemestudio'),
                'fecha_hasta'       =>  $request->input('depemestudio'),
                'hora_de'           =>  $request->input('hastapemestudio'),
                'hora_hasta'        =>  $request->input('hastapemestudio'),
            'fecha_creacion'    =>  date('Y-m-d H:i:s'),
            'estado_jefe'       =>  true,
            'dias_count'        =>  $volador
        ]);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            
            //Server settings                            // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
            $mail->Password = 'Newsist2018';           // SMTP password
            $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to
  
            //Recipients
            $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
  
            $mail->addAddress($jefe->email);     // Add a recipient
  
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tiene una nueva gestion pendiente!';
            $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
  
            $mail->send();
        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
       }
                break;
            case 8:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){

                $date_1 = date_create($request->input('delicjuzcom'));
                $date_2 = date_create($request->input('hastalicjuzcom'));
                if ($date_1 > $date_2) return FALSE;
                $bussiness_days = array();
                while ($date_1 <= $date_2) {
                    $day_week = $date_1->format('w');
                    if ($day_week > 0 && $day_week < 7) {
                        $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                    }
                    date_add($date_1, date_interval_create_from_date_string('1 day'));
                }
                if (strtolower('array') === 'sum') {
                    array_map(function($k) use(&$bussiness_days) {
                        $bussiness_days[$k] = count($bussiness_days[$k]);
                    }, array_keys($bussiness_days));
                }
                $array_dias = [];
                foreach($bussiness_days as $loco){
                   $volador = count($loco);
                }

            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Por asuntos judiciales',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('delicjuzcom'),
                'hora_de'           =>  $request->input('hastalicjuzcom'),
                'hora_hasta'        =>  $request->input('hastalicjuzcom'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador

            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
      
                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   
    }elseif (2 == Auth::user()->tipo_rol){

        $date_1 = date_create($request->input('delicjuzcom'));
        $date_2 = date_create($request->input('hastalicjuzcom'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Por asuntos judiciales',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'dias_count'        =>  $volador,
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('delicjuzcom'),
                'hora_de'           =>  $request->input('hastalicjuzcom'),
                'hora_hasta'        =>  $request->input('hastalicjuzcom'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

       }else {

        $date_1 = date_create($request->input('delicjuzcom'));
        $date_2 = date_create($request->input('hastalicjuzcom'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }


        $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
        $autorization = Autorization::create([
            'tipo_ro'  =>  Auth::user()->tipo_rol,
            'nombre_usuario'    =>  Auth::user()->name,
            'user_id'           =>  Auth::user()->id,
            'legajo'            =>  Auth::user()->num_legajo,
            'cuil'              =>  Auth::user()->cuil,
            'tipo_autorizacion' =>  'Por asuntos judiciales',
            'rol_usuario'       =>  Auth::user()->rol_usuario,
            'sector'            =>  $puesto->nombre_puesto,
            'autorizacion_id'   =>  $request->input('opcionauto'),
            'fecha_de'          =>  $request->input('delicjuzcom'),
            'fecha_hasta'       =>  $request->input('delicjuzcom'),
            'hora_de'           =>  $request->input('hastalicjuzcom'),
            'hora_hasta'        =>  $request->input('hastalicjuzcom'),
            'fecha_creacion'    =>  date('Y-m-d H:i:s'),
            'estado_jefe'       =>  true,
            'dias_count'        =>  $volador
        ]);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            
            //Server settings                            // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
            $mail->Password = 'Newsist2018';           // SMTP password
            $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to
  
            //Recipients
            $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
  
            $mail->addAddress($jefe->email);     // Add a recipient
  
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tiene una nueva gestion pendiente!';
            $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
  
            $mail->send();
        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
       }
                break;
                case 9:
                $puesto = Puesto::find(Auth::user()->rol_usuario);
                if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){

                    $date_1 = date_create($request->input('delicjuzcom'));
                    $date_2 = date_create($request->input('hastalicjuzcom'));
                    if ($date_1 > $date_2) return FALSE;
                    $bussiness_days = array();
                    while ($date_1 <= $date_2) {
                        $day_week = $date_1->format('w');
                        if ($day_week > 0 && $day_week < 7) {
                            $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                        }
                        date_add($date_1, date_interval_create_from_date_string('1 day'));
                    }
                    if (strtolower('array') === 'sum') {
                        array_map(function($k) use(&$bussiness_days) {
                            $bussiness_days[$k] = count($bussiness_days[$k]);
                        }, array_keys($bussiness_days));
                    }
                    $array_dias = [];
                    foreach($bussiness_days as $loco){
                       $volador = count($loco);
                    }
                
                    $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
                $autorization = Autorization::create([
                    'tipo_ro'  =>  Auth::user()->tipo_rol,
                    'nombre_usuario'    =>  Auth::user()->name,
                    'user_id'           =>  Auth::user()->id,
                    'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                    'tipo_autorizacion' =>  'Tramites bancarios',
                    'rol_usuario'       =>  Auth::user()->rol_usuario,
                    'sector'            =>  $puesto->nombre_puesto,
                    'autorizacion_id'   =>  $request->input('opcionauto'),
                    'fecha_de'          =>  $request->input('delicjuzcom'),
                    'fecha_hasta'       =>  $request->input('delicjuzcom'),
                    'hora_de'           =>  $request->input('hastalicjuzcom'),
                    'hora_hasta'        =>  $request->input('hastalicjuzcom'),
                    'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                    'dias_count'        =>  $volador
                ]);
                $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    
                    //Server settings                            // Enable verbose debug output
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                    $mail->Password = 'Newsist2018';           // SMTP password
                    $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 25;                                    // TCP port to connect to
          
                    //Recipients
                    $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
          
                    $mail->addAddress($jefe->email);     // Add a recipient
          
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Tiene una nueva gestion pendiente!';
                    $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
          
                    $mail->send();
                return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
                } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }   
        }elseif (2 == Auth::user()->tipo_rol){
            $date_1 = date_create($request->input('delicjuzcom'));
            $date_2 = date_create($request->input('hastalicjuzcom'));
            if ($date_1 > $date_2) return FALSE;
            $bussiness_days = array();
            while ($date_1 <= $date_2) {
                $day_week = $date_1->format('w');
                if ($day_week > 0 && $day_week < 7) {
                    $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                }
                date_add($date_1, date_interval_create_from_date_string('1 day'));
            }
            if (strtolower('array') === 'sum') {
                array_map(function($k) use(&$bussiness_days) {
                    $bussiness_days[$k] = count($bussiness_days[$k]);
                }, array_keys($bussiness_days));
            }
            $array_dias = [];
            foreach($bussiness_days as $loco){
               $volador = count($loco);
            }
    
                $autorization = Autorization::create([
                    'tipo_ro'  =>  Auth::user()->tipo_rol,
                    'nombre_usuario'    =>  Auth::user()->name,
                    'user_id'           =>  Auth::user()->id,
                    'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                    'tipo_autorizacion' =>  'Tramites bancarios',
                    'rol_usuario'       =>  Auth::user()->rol_usuario,
                    'sector'            =>  $puesto->nombre_puesto,
                    'autorizacion_id'   =>  $request->input('opcionauto'),
                    'dias_count'        =>  $volador,
                    'fecha_de'          =>  $request->input('delicjuzcom'),
                    'fecha_hasta'       =>  $request->input('delicjuzcom'),
                    'hora_de'           =>  $request->input('hastalicjuzcom'),
                    'hora_hasta'        =>  $request->input('hastalicjuzcom'),
                    'fecha_creacion'    =>  date('Y-m-d H:i:s')
                ]);
    
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
    
           }else {

            $date_1 = date_create($request->input('delicjuzcom'));
            $date_2 = date_create($request->input('hastalicjuzcom'));
            if ($date_1 > $date_2) return FALSE;
            $bussiness_days = array();
            while ($date_1 <= $date_2) {
                $day_week = $date_1->format('w');
                if ($day_week > 0 && $day_week < 7) {
                    $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                }
                date_add($date_1, date_interval_create_from_date_string('1 day'));
            }
            if (strtolower('array') === 'sum') {
                array_map(function($k) use(&$bussiness_days) {
                    $bussiness_days[$k] = count($bussiness_days[$k]);
                }, array_keys($bussiness_days));
            }
            $array_dias = [];
            foreach($bussiness_days as $loco){
               $volador = count($loco);
            }

            $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Tramites bancarios',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('delicjuzcom'),
                'hora_de'           =>  $request->input('hastalicjuzcom'),
                'hora_hasta'        =>  $request->input('hastalicjuzcom'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador
            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
      
                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
           }
                    break;
// Aca termina el nueve
            case 10:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){

                $date_1 = date_create($request->input('delicjuzcom'));
                $date_2 = date_create($request->input('hastalicjuzcom'));
                if ($date_1 > $date_2) return FALSE;
                $bussiness_days = array();
                while ($date_1 <= $date_2) {
                    $day_week = $date_1->format('w');
                    if ($day_week > 0 && $day_week < 7) {
                        $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                    }
                    date_add($date_1, date_interval_create_from_date_string('1 day'));
                }
                if (strtolower('array') === 'sum') {
                    array_map(function($k) use(&$bussiness_days) {
                        $bussiness_days[$k] = count($bussiness_days[$k]);
                    }, array_keys($bussiness_days));
                }
                $array_dias = [];
                foreach($bussiness_days as $loco){
                   $volador = count($loco);
                }
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Visita médica',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador

            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
      
                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   
    }elseif (2 == Auth::user()->tipo_rol){

        $date_1 = date_create($request->input('delicjuzcom'));
        $date_2 = date_create($request->input('hastalicjuzcom'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }


            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Visita médica',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
            
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador
            ]);

        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

       }else {

        $date_1 = date_create($request->input('delicjuzcom'));
        $date_2 = date_create($request->input('hastalicjuzcom'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

        $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
        $autorization = Autorization::create([
            'tipo_ro'  =>  Auth::user()->tipo_rol,
            'nombre_usuario'    =>  Auth::user()->name,
            'user_id'           =>  Auth::user()->id,
            'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
            'tipo_autorizacion' =>  'Visita médica',
            'rol_usuario'       =>  Auth::user()->rol_usuario,
            'sector'            =>  $puesto->nombre_puesto,
            'autorizacion_id'   =>  $request->input('opcionauto'),
            'fecha_de'          =>  $request->input('delicjuzcom'),
            'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
            'fecha_creacion'    =>  date('Y-m-d H:i:s'),
            'estado_jefe'       =>  true,
            'dias_count'        =>  $volador
        ]);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            
            //Server settings                            // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
            $mail->Password = 'Newsist2018';           // SMTP password
            $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to
  
            //Recipients
            $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
  
            $mail->addAddress($jefe->email);     // Add a recipient
  
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tiene una nueva gestion pendiente!';
            $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
  
            $mail->send();
        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
       }
                break;
/* Aca termina el 10 */
case 11:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){

                $date_1 = date_create($request->input('delicjuzcom'));
                $date_2 = date_create($request->input('hastalicjuzcom'));
                if ($date_1 > $date_2) return FALSE;
                $bussiness_days = array();
                while ($date_1 <= $date_2) {
                    $day_week = $date_1->format('w');
                    if ($day_week > 0 && $day_week < 7) {
                        $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                    }
                    date_add($date_1, date_interval_create_from_date_string('1 day'));
                }
                if (strtolower('array') === 'sum') {
                    array_map(function($k) use(&$bussiness_days) {
                        $bussiness_days[$k] = count($bussiness_days[$k]);
                    }, array_keys($bussiness_days));
                }
                $array_dias = [];
                foreach($bussiness_days as $loco){
                   $volador = count($loco);
                }

            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Reunión de padres en jardín o colegio',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('delicjuzcom'),
                'hora_de'           =>  $request->input('hastalicjuzcom'),
                'hora_hasta'        =>  $request->input('hastalicjuzcom'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador
            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
      
                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   
    }elseif (2 == Auth::user()->tipo_rol){

        $date_1 = date_create($request->input('delicjuzcom'));
        $date_2 = date_create($request->input('hastalicjuzcom'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Reunión de padres en jardín o colegio',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'dias_count'        =>  $volador,
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('delicjuzcom'),
                'hora_de'           =>  $request->input('hastalicjuzcom'),
                'hora_hasta'        =>  $request->input('hastalicjuzcom'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

       }else {

        $date_1 = date_create($request->input('delicjuzcom'));
        $date_2 = date_create($request->input('hastalicjuzcom'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

        $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
        $autorization = Autorization::create([
            'tipo_ro'  =>  Auth::user()->tipo_rol,
            'nombre_usuario'    =>  Auth::user()->name,
            'user_id'           =>  Auth::user()->id,
            'legajo'            =>  Auth::user()->num_legajo,
            'cuil'              =>  Auth::user()->cuil,
            'tipo_autorizacion' =>  'Reunión de padres en jardín o colegio',
            'rol_usuario'       =>  Auth::user()->rol_usuario,
            'sector'            =>  $puesto->nombre_puesto,
            'autorizacion_id'   =>  $request->input('opcionauto'),
            'fecha_de'          =>  $request->input('delicjuzcom'),
            'fecha_hasta'       =>  $request->input('delicjuzcom'),
            'hora_de'           =>  $request->input('hastalicjuzcom'),
            'hora_hasta'        =>  $request->input('hastalicjuzcom'),
            'fecha_creacion'    =>  date('Y-m-d H:i:s'),
            'estado_jefe'       =>  true,
            'dias_count'        =>  $volador
        ]);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            
            //Server settings                            // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
            $mail->Password = 'Newsist2018';           // SMTP password
            $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to
  
            //Recipients
            $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
  
            $mail->addAddress($jefe->email);     // Add a recipient
  
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tiene una nueva gestion pendiente!';
            $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
  
            $mail->send();
        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
       }
                break;
/* Aca termina el 11 */
            case 12:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){

                $date_1 = date_create($request->input('delicjuzcom'));
                $date_2 = date_create($request->input('hastalicjuzcom'));
                if ($date_1 > $date_2) return FALSE;
                $bussiness_days = array();
                while ($date_1 <= $date_2) {
                    $day_week = $date_1->format('w');
                    if ($day_week > 0 && $day_week < 7) {
                        $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                    }
                    date_add($date_1, date_interval_create_from_date_string('1 day'));
                }
                if (strtolower('array') === 'sum') {
                    array_map(function($k) use(&$bussiness_days) {
                        $bussiness_days[$k] = count($bussiness_days[$k]);
                    }, array_keys($bussiness_days));
                }
                $array_dias = [];
                foreach($bussiness_days as $loco){
                   $volador = count($loco);
                }
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Tramites Personales',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador
            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
      
                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   
    }elseif (2 == Auth::user()->tipo_rol){

        $date_1 = date_create($request->input('delicjuzcom'));
        $date_2 = date_create($request->input('hastalicjuzcom'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }


            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Tramites Personales',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'dias_count'        =>  $volador,
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

       }else{

        $date_1 = date_create($request->input('delicjuzcom'));
        $date_2 = date_create($request->input('hastalicjuzcom'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

        $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
        $autorization = Autorization::create([
            'tipo_ro'  =>  Auth::user()->tipo_rol,
            'nombre_usuario'    =>  Auth::user()->name,
            'user_id'           =>  Auth::user()->id,
            'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
            'tipo_autorizacion' =>  'Tramites Personales',
            'rol_usuario'       =>  Auth::user()->rol_usuario,
            'sector'            =>  $puesto->nombre_puesto,
            'autorizacion_id'   =>  $request->input('opcionauto'),
            'fecha_de'          =>  $request->input('delicjuzcom'),
            'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
            'fecha_creacion'    =>  date('Y-m-d H:i:s'),
            'dias_count'        =>  $volador

        ]);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            
            //Server settings                            // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
            $mail->Password = 'Newsist2018';           // SMTP password
            $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to
  
            //Recipients
            $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
  
            $mail->addAddress($jefe->email);     // Add a recipient
  
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tiene una nueva gestion pendiente!';
            $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
  
            $mail->send();
        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
       }
                break;
/* Aca termina el 12 */
/* Aca empieza el trece */
                case 13:
                $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){

                $date_1 = date_create($request->input('delicjuzcom'));
                $date_2 = date_create($request->input('hastalicjuzcom'));
                if ($date_1 > $date_2) return FALSE;
                $bussiness_days = array();
                while ($date_1 <= $date_2) {
                    $day_week = $date_1->format('w');
                    if ($day_week > 0 && $day_week < 7) {
                        $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
                    }
                    date_add($date_1, date_interval_create_from_date_string('1 day'));
                }
                if (strtolower('array') === 'sum') {
                    array_map(function($k) use(&$bussiness_days) {
                        $bussiness_days[$k] = count($bussiness_days[$k]);
                    }, array_keys($bussiness_days));
                }
                $array_dias = [];
                foreach($bussiness_days as $loco){
                   $volador = count($loco);
                }
            
            $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Vacaciones',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
                'motivo'            =>  $request->input('motivo'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s'),
                'dias_count'        =>  $volador

            ]);
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings        
                $mail->SMTPDebug = 2;                      // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
      
                $mail->addAddress($jefe->email);     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   
    
    }elseif (2 == Auth::user()->tipo_rol){

        $date_1 = date_create($request->input('delicjuzcom'));
        $date_2 = date_create($request->input('hastalicjuzcom'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }


            $autorization = Autorization::create([
                'tipo_ro'  =>  Auth::user()->tipo_rol,
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'legajo'            =>  Auth::user()->num_legajo,
                    'cuil'              =>  Auth::user()->cuil,
                'tipo_autorizacion' =>  'Vacaciones',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'dias_count'        =>  $volador,
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
                'motivo'            =>  $request->input('motivo'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);
        
        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

       }else{

        $date_1 = date_create($request->input('delicjuzcom'));
        $date_2 = date_create($request->input('hastalicjuzcom'));
        if ($date_1 > $date_2) return FALSE;
        $bussiness_days = array();
        while ($date_1 <= $date_2) {
            $day_week = $date_1->format('w');
            if ($day_week > 0 && $day_week < 7) {
                $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
            }
            date_add($date_1, date_interval_create_from_date_string('1 day'));
        }
        if (strtolower('array') === 'sum') {
            array_map(function($k) use(&$bussiness_days) {
                $bussiness_days[$k] = count($bussiness_days[$k]);
            }, array_keys($bussiness_days));
        }
        $array_dias = [];
        foreach($bussiness_days as $loco){
           $volador = count($loco);
        }

        $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
        $autorization = Autorization::create([
            'tipo_ro'  =>  Auth::user()->tipo_rol,
            'nombre_usuario'    =>  Auth::user()->name,
            'user_id'           =>  Auth::user()->id,
            'legajo'            =>  Auth::user()->num_legajo,
                'cuil'              =>  Auth::user()->cuil,
            'tipo_autorizacion' =>  'Vacaciones',
            'rol_usuario'       =>  Auth::user()->rol_usuario,
            'sector'            =>  $puesto->nombre_puesto,
            'autorizacion_id'   =>  $request->input('opcionauto'),
            'fecha_de'          =>  $request->input('delicjuzcom'),
            'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
            'motivo'            =>  $request->input('motivo'),
            'fecha_creacion'    =>  date('Y-m-d H:i:s'),
            'estado_jefe'       =>  true,
            'dias_count'        => $volador
        ]);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            
            //Server settings        
            $mail->SMTPDebug = 2;                      // Enable verbose debug output
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
            $mail->Password = 'Newsist2018';           // SMTP password
            $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;                                    // TCP port to connect to
  
            //Recipients
            $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
  
            $mail->addAddress($jefe->email);     // Add a recipient
  
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Tiene una nueva gestion pendiente!';
            $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";
  
            $mail->send();
        return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

        } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
       }
                break;
/* Aca empieza el catorce */
case 14:
$puesto = Puesto::find(Auth::user()->rol_usuario);
if(3 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){

    $date_1 = date_create($request->input('delicjuzcom'));
    $date_2 = date_create($request->input('hastalicjuzcom'));
    if ($date_1 > $date_2) return FALSE;
    $bussiness_days = array();
    while ($date_1 <= $date_2) {
        $day_week = $date_1->format('w');
        if ($day_week > 0 && $day_week < 7) {
            $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
        }
        date_add($date_1, date_interval_create_from_date_string('1 day'));
    }
    if (strtolower('array') === 'sum') {
        array_map(function($k) use(&$bussiness_days) {
            $bussiness_days[$k] = count($bussiness_days[$k]);
        }, array_keys($bussiness_days));
    }
    $array_dias = [];
    foreach($bussiness_days as $loco){
       $volador = count($loco);
    }

$jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
$autorization = Autorization::create([
    'tipo_ro'  =>  Auth::user()->tipo_rol,
'nombre_usuario'    =>  Auth::user()->name,
'user_id'           =>  Auth::user()->id,
'legajo'            =>  Auth::user()->num_legajo,
'cuil'              =>  Auth::user()->cuil,
'tipo_autorizacion' =>  'Otros',
'rol_usuario'       =>  Auth::user()->rol_usuario,
'sector'            =>  $puesto->nombre_puesto,
'autorizacion_id'   =>  $request->input('opcionauto'),
'fecha_de'          =>  $request->input('delicjuzcom'),
'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
'motivo'            =>  $request->input('motivo'),
'fecha_creacion'    =>  date('Y-m-d H:i:s'),
'dias_count'        =>  $volador

]);
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {

//Server settings        
$mail->SMTPDebug = 2;                      // Enable verbose debug output
$mail->CharSet = 'UTF-8';
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
$mail->Password = 'Newsist2018';           // SMTP password
$mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

//Recipients
$mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');

$mail->addAddress($jefe->email);     // Add a recipient

//Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Tiene una nueva gestion pendiente!';
$mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";

$mail->send();
return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

} catch (Exception $e) {
echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}   

}elseif (2 == Auth::user()->tipo_rol){

    $date_1 = date_create($request->input('delicjuzcom'));
    $date_2 = date_create($request->input('hastalicjuzcom'));
    if ($date_1 > $date_2) return FALSE;
    $bussiness_days = array();
    while ($date_1 <= $date_2) {
        $day_week = $date_1->format('w');
        if ($day_week > 0 && $day_week < 7) {
            $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
        }
        date_add($date_1, date_interval_create_from_date_string('1 day'));
    }
    if (strtolower('array') === 'sum') {
        array_map(function($k) use(&$bussiness_days) {
            $bussiness_days[$k] = count($bussiness_days[$k]);
        }, array_keys($bussiness_days));
    }
    $array_dias = [];
    foreach($bussiness_days as $loco){
       $volador = count($loco);
    }

$autorization = Autorization::create([
    'tipo_ro'  =>  Auth::user()->tipo_rol,
'nombre_usuario'    =>  Auth::user()->name,
'user_id'           =>  Auth::user()->id,
'legajo'            =>  Auth::user()->num_legajo,
'cuil'              =>  Auth::user()->cuil,
'tipo_autorizacion' =>  'Otros',
'rol_usuario'       =>  Auth::user()->rol_usuario,
'sector'            =>  $puesto->nombre_puesto,
'autorizacion_id'   =>  $request->input('opcionauto'),
'fecha_de'          =>  $request->input('delicjuzcom'),
'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
'motivo'            =>  $request->input('motivo'),
'fecha_creacion'    =>  date('Y-m-d H:i:s'),
'dias_count'        =>  $volador
]);

return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

}else {

    $date_1 = date_create($request->input('delicjuzcom'));
    $date_2 = date_create($request->input('hastalicjuzcom'));
    if ($date_1 > $date_2) return FALSE;
    $bussiness_days = array();
    while ($date_1 <= $date_2) {
        $day_week = $date_1->format('w');
        if ($day_week > 0 && $day_week < 7) {
            $bussiness_days[$date_1->format('Y-m')][] = $date_1->format('d');
        }
        date_add($date_1, date_interval_create_from_date_string('1 day'));
    }
    if (strtolower('array') === 'sum') {
        array_map(function($k) use(&$bussiness_days) {
            $bussiness_days[$k] = count($bussiness_days[$k]);
        }, array_keys($bussiness_days));
    }
    $array_dias = [];
    foreach($bussiness_days as $loco){
       $volador = count($loco);
    }

    $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
$autorization = Autorization::create([
    'tipo_ro'  =>  Auth::user()->tipo_rol,
'nombre_usuario'    =>  Auth::user()->name,
'user_id'           =>  Auth::user()->id,
'legajo'            =>  Auth::user()->num_legajo,
'cuil'              =>  Auth::user()->cuil,
'tipo_autorizacion' =>  'Otros',
'rol_usuario'       =>  Auth::user()->rol_usuario,
'sector'            =>  $puesto->nombre_puesto,
'autorizacion_id'   =>  $request->input('opcionauto'),
'fecha_de'          =>  $request->input('delicjuzcom'),
'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
'motivo'            =>  $request->input('motivo'),
'fecha_creacion'    =>  date('Y-m-d H:i:s'),
'dias_count'        =>  $volador
]);
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {

//Server settings        
$mail->SMTPDebug = 2;                      // Enable verbose debug output
$mail->CharSet = 'UTF-8';
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
$mail->Password = 'Newsist2018';           // SMTP password
$mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

//Recipients
$mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');

$mail->addAddress($jefe->email);     // Add a recipient

//Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Tiene una nueva gestion pendiente!';
$mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".Auth::user()->name."</h2></div>";

$mail->send();
return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');

} catch (Exception $e) {
echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}
break;
        }      
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autorization  $autorization
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
            $autori = Autorization::find($id);

         switch ($autori->autorizacion_id) {

            case 1:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.matrimonio', $data);
            return $pdf->stream('matrimonio'.$autori->id.'.pdf');
            // return view('pdf.matrimonio');
                break;

            case 2:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.nacihijo', $data);
            return $pdf->stream('nacimientohijo'.$autori->id.'.pdf');
                break;

            case 3:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.casahijo', $data);
            return $pdf->stream('casamientohijo'.$autori->id.'.pdf');
                break;

            case 4:
            $data = ['data'=>$autori];
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            $pdf = PDF::loadView('pdf.mudanza', $data);
            return $pdf->stream('mudanza'.$autori->id.'.pdf');
                break;

            case 5:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.enfamiliar', $data);
            return $pdf->stream('enffamiliar'.$autori->id.'.pdf');
                break;

            case 6:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.examen', $data);
            return $pdf->stream('examen'.$autori->id.'.pdf');
                break;

            case 7:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.estudio', $data);
            return $pdf->stream('estudio'.$autori->id.'.pdf');
                break;

            case 8:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.concurrencia', $data);
            return $pdf->stream('concurrencia'.$autori->id.'.pdf');
                 break;

            case 9:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.bancario', $data);
            return $pdf->stream('bancario'.$autori->id.'.pdf');
                 break;

            case 10:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.vmedica', $data);
            return $pdf->stream('vmedica'.$autori->id.'.pdf');
                break;

            case 11:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.reunionjc', $data);
            return $pdf->stream('reunionjc'.$autori->id.'.pdf');
                break;

            case 12:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.tpersonales', $data);
            return $pdf->stream('tpersonales'.$autori->id.'.pdf');
                break;

            case 13:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.vacaciones', $data);
            return $pdf->stream('vacaciones'.$autori->id.'.pdf');
                break;
            case 14:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.otros', $data);
            return $pdf->stream('otros'.$autori->id.'.pdf');
                break;
         }
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autorization  $autorization
     * @return \Illuminate\Http\Response
     */
    public function edit(Autorization $autorization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autorization  $autorization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$id=$request->input('id');
        //dd($request);
        if(1 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){
            if(1==$request->input('rechazado')){
                $auto = Autorization::where('id', $id)->update([
                    'estado_jefe' => false,
                ]);
                return back();
            }elseif(2==$request->input('aprobado')){
                $auto = Autorization::where('id', $id)->update([
                    'estado_jefe' => true,
                ]); 
                return back();
            }else{
                return '<!-- rechazado: '.$request->input('rechazado').' --> <a href="javascript:history.back()">Volver</a>';
            }
        }
        // return '<a href="javascript:history.back()">Volver</a>';
        if(2 == Auth::user()->tipo_rol && 5 != Auth::user()->rol_usuario){
            if(1==$request->input('rechazado')){
                $auto = Autorization::where('id', $id)->update([
                    'estado_jefe' => false,
                ]);
                return back();
            }elseif(2==$request->input('aprobado')){
                $auto = Autorization::where('id', $id)->update([
                    'estado_jefe' => true,
                ]);
                $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                
                //Server settings                            // Enable verbose debug output
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
                $mail->Password = 'Newsist2018';           // SMTP password
                $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 25;                                    // TCP port to connect to
      
                //Recipients
                $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk - gestión pendiente');
      
                $mail->addAddress('admpersonal@odontopraxis.com.ar');     // Add a recipient
      
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiene una nueva gestion pendiente!';
                $mail->Body    =   "<div style='text-align:center'><h2>Tiene una gestion pendiente de: ".$request->input('nombre_envia')."</h2></div>";
      
                $mail->send();
            return back()->with('success', 'Solicitud pendiente de aprobación por Recursos Humanos.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
                return back();
            }else{
                return '<!-- rechazado: '.$request->input('rechazado').' --> <a href="javascript:history.back()">Volver</a>';
            }
        }
        if(2 == Auth::user()->tipo_rol && 5 == Auth::user()->rol_usuario){
            if(1==$request->input('rechazado')){
                $auto = Autorization::where('id', $id)->update([
                    'estado_rrhh' => false,
                ]);
                return back();
            }elseif(2==$request->input('aprobado')){
                $auto = Autorization::where('id', $id)->update([
                    'estado_rrhh' => true,
                ]); 
                return back();
            }else{
                return '<!-- rechazado: '.$request->input('rechazado').' --> <a href="javascript:history.back()">Volver</a>';
            }
        }
       
      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autorization  $autorization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autorization $autorization)
    {
        //
    }
}
