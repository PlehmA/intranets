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

        $autouser = Autorization::where('user_id', Auth::user()->id)->get();
        //dd($autorizacionesjefe);
       
        return view('autorizaciones.list', compact(['notificacion', 'autorizacionesjefe', 'autorirrhh', 'autouser']));
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
            if(3 == Auth::user()->tipo_rol){
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
                
                $autorization = Autorization::create([
                    'nombre_usuario'    =>  Auth::user()->name,
                    'user_id'           =>  Auth::user()->id,
                    'tipo_autorizacion' =>  'Licencia por matrimonio',
                    'rol_usuario'       =>  Auth::user()->rol_usuario,
                    'sector'            =>  $puesto->nombre_puesto,
                    'autorizacion_id'   =>  $request->input('opcionauto'),
                    'fecha_de'          =>  $request->input('dematrimonio'),
                    'fecha_hasta'       =>  $request->input('hastamatrimonio'),
                    'fecha_creacion'    =>  date('Y-m-d H:i:s')
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
                return back()->with('success', 'Pedido asentado correctamente.');
                } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            } ##//CATCH
           } ##//IF
           if(2 == Auth::user()->tipo_rol){

                $autorization = Autorization::create([
                    'nombre_usuario'    =>  Auth::user()->name,
                    'user_id'           =>  Auth::user()->id,
                    'tipo_autorizacion' =>  'Licencia por matrimonio',
                    'rol_usuario'       =>  Auth::user()->rol_usuario,
                    'sector'            =>  $puesto->nombre_puesto,
                    'autorizacion_id'   =>  $request->input('opcionauto'),
                    'estado_jefe'       =>  true,
                    'fecha_de'          =>  $request->input('dematrimonio'),
                    'fecha_hasta'       =>  $request->input('hastamatrimonio'),
                    'fecha_creacion'    =>  date('Y-m-d H:i:s')
                ]);

            return back()->with('success', 'Pedido asentado correctamente.');

           }
                break;
            case 2:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol){
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por nacimiento de hijo',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('dehijos'),
                'fecha_hasta'       =>  $request->input('hastahijos'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
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
            return back()->with('success', 'Pedido asentado correctamente.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   }
        if(2 == Auth::user()->tipo_rol){

            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por nacimiento de hijo',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'estado_jefe'       =>  true,
                'fecha_de'          =>  $request->input('dehijos'),
                'fecha_hasta'       =>  $request->input('hastahijos'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Pedido asentado correctamente.');

       }
                break;
            case 3:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol){
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por casamiento de hijo/s',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('decasahijos'),
                'fecha_hasta'       =>  $request->input('hastacasahijos'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
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
            return back()->with('success', 'Pedido asentado correctamente.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   }
        if(2 == Auth::user()->tipo_rol){

            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por casamiento de hijo/s',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'estado_jefe'       =>  true,
                'fecha_de'          =>  $request->input('decasahijos'),
                'fecha_hasta'       =>  $request->input('hastacasahijos'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Pedido asentado correctamente.');

       }

                break;
            case 4:
            
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol){
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
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
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
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
            return back()->with('success', 'Pedido asentado correctamente.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   }
        if(2 == Auth::user()->tipo_rol){

            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por mudanza',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'estado_jefe'       =>  true,
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

        return back()->with('success', 'Pedido asentado correctamente.');

       }
                break;
            case 5:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol){
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por enfermedad del familiar',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('deenffamiliar'),
                'fecha_hasta'       =>  $request->input('hastaenffamiliar'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
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
            return back()->with('success', 'Pedido asentado correctamente.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   }
        if(2 == Auth::user()->tipo_rol){

            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por enfermedad del familiar',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'estado_jefe'       =>  true,
                'fecha_de'          =>  $request->input('deenffamiliar'),
                'fecha_hasta'       =>  $request->input('hastaenffamiliar'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Pedido asentado correctamente.');

       }
                break;
            case 6:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol){
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por exámen',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('delicexamen'),
                'fecha_hasta'       =>  $request->input('hastalicexamen'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
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
            return back()->with('success', 'Pedido asentado correctamente.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   }
        if(2 == Auth::user()->tipo_rol){

            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por exámen',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'estado_jefe'       =>  true,
                'fecha_de'          =>  $request->input('delicexamen'),
                'fecha_hasta'       =>  $request->input('hastalicexamen'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Pedido asentado correctamente.');

       }
                break;
            case 7:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol){
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por estudio',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('depemestudio'),
                'fecha_hasta'       =>  $request->input('hastapemestudio'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
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
            return back()->with('success', 'Pedido asentado correctamente.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   }
        if(2 == Auth::user()->tipo_rol){

            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por estudio',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'estado_jefe'       =>  true,
                'fecha_de'          =>  $request->input('depemestudio'),
                'fecha_hasta'       =>  $request->input('hastapemestudio'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Pedido asentado correctamente.');

       }
                break;
            case 8:
            $puesto = Puesto::find(Auth::user()->rol_usuario);
            if(3 == Auth::user()->tipo_rol){
            
                $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por concurrencia a juzgado, autoridad administrativa o Comisión Paritaria de Interpretación',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
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
            return back()->with('success', 'Pedido asentado correctamente.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   }
        if(2 == Auth::user()->tipo_rol){

            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Licencia por concurrencia a juzgado, autoridad administrativa o Comisión Paritaria de Interpretación',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'estado_jefe'       =>  true,
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);

        return back()->with('success', 'Pedido asentado correctamente.');

       }
                break;
                case 9:
                $puesto = Puesto::find(Auth::user()->rol_usuario);
                if(3 == Auth::user()->tipo_rol){
            
                    $jefe = User::where('tipo_rol', 2)->where('rol_usuario', Auth::user()->rol_usuario)->first();
            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Otros',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
                'motivo'            =>  $request->input('motivo'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
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
            return back()->with('success', 'Pedido asentado correctamente.');
            } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }   }
        if(2 == Auth::user()->tipo_rol){

            $autorization = Autorization::create([
                'nombre_usuario'    =>  Auth::user()->name,
                'user_id'           =>  Auth::user()->id,
                'tipo_autorizacion' =>  'Otros',
                'rol_usuario'       =>  Auth::user()->rol_usuario,
                'sector'            =>  $puesto->nombre_puesto,
                'autorizacion_id'   =>  $request->input('opcionauto'),
                'estado_jefe'       =>  true,
                'fecha_de'          =>  $request->input('delicjuzcom'),
                'fecha_hasta'       =>  $request->input('hastalicjuzcom'),
                'motivo'            =>  $request->input('motivo'),
                'fecha_creacion'    =>  date('Y-m-d H:i:s')
            ]);
        
        return back()->with('success', 'Pedido asentado correctamente.');

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
            return $pdf->download('matrimonio'.$autori->id.'.pdf');
                break;
            case 2:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.nacihijo', $data);
            return $pdf->download('nacimientohijo'.$autori->id.'.pdf');
                break;
            case 3:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.casahijo', $data);
            return $pdf->download('casamientohijo'.$autori->id.'.pdf');
                break;
            case 4:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.mudanza', $data);
            return $pdf->download('mudanza'.$autori->id.'.pdf');
                break;
            case 5:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.enfamiliar', $data);
            return $pdf->download('enffamiliar'.$autori->id.'.pdf');
                break;
            case 6:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.examen', $data);
            return $pdf->download('examen'.$autori->id.'.pdf');
                break;
            case 7:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.estudio', $data);
            return $pdf->download('estudio'.$autori->id.'.pdf');
                break;
            case 8:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.concurrencia', $data);
            return $pdf->download('concurrencia'.$autori->id.'.pdf');
                 break;
            case 9:
            $data = ['data'=>$autori];
            $pdf = PDF::loadView('pdf.otros', $data);
            return $pdf->download('otros'.$autori->id.'.pdf');
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
