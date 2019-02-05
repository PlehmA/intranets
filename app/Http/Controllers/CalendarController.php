<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Mail\Invite;
use App\Notify;
use Auth;
use App\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Pusher\Laravel\Facades\Pusher;
use DB;
use PDF;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
      
      //dump('entro en index');
      if ( 1 == $request->input('invitacion')) {
        //dump('Llamo Mostrar');
        return $this->mostrar($request);
      }
      
      $eventos = \App\Calendar::where('id_usuario', Auth::user()->id)->get();
      $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

      $users = User::where('id', '<>', Auth::user()->id)->where('username', '<>', 'udemo')->orderBy('name', 'asc')->get();

      $usuarios = User::all();

      $companieros = User::where('rol_usuario', Auth::user()->rol_usuario)->get();

        return view('calendario.calendar', compact('eventos', 'notificacion', 'usuarios', 'users', 'companieros'));

    }

    public function store(Request $request)
    {
        if (null === $request->input('selecMultiple')) {
            $calendar = new Calendar;

      $calendar->id_usuario = Auth::user()->id;
      $calendar->title = $request->input('title');
      if ($request->input('descripcion') == "") {
        $calendar->descripcion = 'Sin descripción';
      }else {
        $calendar->descripcion = $request->input('descripcion');
      }
      $calendar->start = $request->input('start')." ".$request->input('startime');
      if ($request->input('end') == "") {
        $calendar->end = null;
      }else {
        $calendar->end = $request->input('end')." ".$request->input('endtime');
      }
      $calendar->color = $request->input('color');
      $calendar->textcolor = $request->input('textcolor');
      $calendar->allday = $request->input('allday');

      if ($request->input('email') != "") {

      foreach ($request->email as $email) {
        $start = date_create($request->input('start'));
        $startime = date_create($request->input('startime'));
        if ($request->input('descripcion') == "") {

          $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
          try {
              //Server settings                            // Enable verbose debug output
              $mail->CharSet = 'UTF-8';
              $mail->isSMTP();                                      // Set mailer to use SMTP
              $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
              $mail->SMTPAuth = true;                               // Enable SMTP authentication
              $mail->Username = Auth::user()->email;                 // SMTP username
              $mail->Password = Auth::user()->contra_mail;                           // SMTP password
              $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 25;                                    // TCP port to connect to
    
              //Recipients
              $mail->setFrom(Auth::user()->email, Auth::user()->name);
    
              $mail->addAddress($email);     // Add a recipient
    
              //Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->AddEmbeddedImage('/var/www/html/intranet3/public/img/calevento.png', 'logo_2u');
              $mail->Subject = 'Invitación a evento';
              $mail->Body    =   "
              <div class='container'>
                        <div style='text-align: center;'>
                        <img src='cid:logo_2u'>
                        </div>
                      <div style='text-align: center;'>
                          <p style='text-align: center; font-size: 20px;'><b>".Auth::user()->name."</b> te ha invitado al envento.</p>
                              <p style='text-align: center; font-size: 20px;'><b>".$request->input('title')." </b></p>
                              <p style='text-align: center; font-size: 20px;'>Fecha: <b>".date_format($start, 'd/m/Y')." </b></p>
                              <p style='text-align: center; font-size: 20px;'>Hora: <b>". date_format($startime, 'H:i')."hs. </b></p>
                        </div>
                    </div>";
    
              $mail->send();
    
              
    
          } catch (Exception $e) {
              echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
          }
        }else{
          $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
          try {
              //Server settings                            // Enable verbose debug output
              $mail->CharSet = 'UTF-8';
              $mail->isSMTP();                                      // Set mailer to use SMTP
              $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
              $mail->SMTPAuth = true;                               // Enable SMTP authentication
              $mail->Username = Auth::user()->email;                 // SMTP username
              $mail->Password = Auth::user()->contra_mail;                           // SMTP password
              $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 25;                                    // TCP port to connect to
    
              //Recipients
              $mail->setFrom(Auth::user()->email, Auth::user()->name);
    
              $mail->addAddress($email);     // Add a recipient
    
              //Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->AddEmbeddedImage('/var/www/html/intranet3/public/img/calevento.png', 'logo_2u');
              $mail->Subject = 'Invitación a evento';
              $mail->Body    =   "
              <div class='container'>
                  <div style='text-align: center;'>
                  <img src='cid:logo_2u'>
                  </div>
                <div style='text-align: center;'>
                    <p style='text-align: center; font-size: 20px;'><b>".Auth::user()->name."</b> te ha invitado al envento.</p>
                        <p style='text-align: center; font-size: 20px;'><b>".$request->input('title')." </b></p>
                        <p style='text-align: center; font-size: 20px;'>Observación: <b>".$request->input('descripcion')." </b></p>
                        <p style='text-align: center; font-size: 20px;'>Fecha: <b>".date_format($start, 'd/m/Y')." </b></p>
                        <p style='text-align: center; font-size: 20px;'>Hora: <b>". date_format($startime, 'H:i')."hs. </b></p>
                  </div>
                  <div style='text-align: center;'>
                </div>
              </div>";
    
              $mail->send();

          } catch (Exception $e) {
              echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
          }
        }
     
      
}
}
$calendar->save();
return back()->with('success', 'Evento agregado correctamente');
        }else {
          $calendar = new Calendar;

          $calendar->id_usuario = Auth::user()->id;
          $calendar->title = $request->input('title');
          if ($request->input('descripcion') == "") {
            $calendar->descripcion = 'Sin descripción';
          }else {
            $calendar->descripcion = $request->input('descripcion');
          }
          $calendar->start = $request->input('start')." ".$request->input('startime');
          if ($request->input('end') == "") {
            $calendar->end = null;
          }else {
            $calendar->end = $request->input('end')." ".$request->input('endtime');
          }
          $calendar->color = $request->input('color');
          $calendar->textcolor = $request->input('textcolor');
          $calendar->allday = $request->input('allday');
    
          if ($request->input('email') != "") {
    
          foreach ($request->email as $email) {
            $start = date_create($request->input('start'));
            $startime = date_create($request->input('startime'));

            if ($request->input('descripcion') == "") {
              $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
              try {
                  //Server settings                            // Enable verbose debug output
                  $mail->CharSet = 'UTF-8';
                  $mail->isSMTP();                                      // Set mailer to use SMTP
                  $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                  $mail->SMTPAuth = true;                               // Enable SMTP authentication
                  $mail->Username = Auth::user()->email;                 // SMTP username
                  $mail->Password = Auth::user()->contra_mail;                           // SMTP password
                  $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                  $mail->Port = 25;                                    // TCP port to connect to
        
                  //Recipients
                  $mail->setFrom(Auth::user()->email, Auth::user()->name);
        
                  $mail->addAddress($email);     // Add a recipient
        
                  //Content
                  $mail->isHTML(true);                                  // Set email format to HTML
                  $mail->AddEmbeddedImage('/var/www/html/intranet3/public/img/calevento.png', 'logo_2u');
                  $mail->Subject = 'Invitación a evento';
                  $mail->Body    =   "
                  <div class='container'>
                        <div style='text-align: center;'>
                        <img src='cid:logo_2u'>
                        </div>
                      <div style='text-align: center;'>
                          <p style='text-align: center; font-size: 20px;'><b>".Auth::user()->name."</b> te ha invitado al envento.</p>
                              <p style='text-align: center; font-size: 20px;'><b>".$request->input('title')." </b></p>
                              <p style='text-align: center; font-size: 20px;'>Fecha: <b>".date_format($start, 'd/m/Y')." </b></p>
                              <p style='text-align: center; font-size: 20px;'>Hora: <b>". date_format($startime, 'H:i')."hs. </b></p>
                        </div>
                        <div style='text-align: center;'>
                      </div>
                    </div>";
        
                  $mail->send();
        
                  
        
              } catch (Exception $e) {
                  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
              }
            }else{
              $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
              try {
                  //Server settings                            // Enable verbose debug output
                  $mail->CharSet = 'UTF-8';
                  $mail->isSMTP();                                      // Set mailer to use SMTP
                  $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                  $mail->SMTPAuth = true;                               // Enable SMTP authentication
                  $mail->Username = Auth::user()->email;                 // SMTP username
                  $mail->Password = Auth::user()->contra_mail;                           // SMTP password
                  $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                  $mail->Port = 25;                                    // TCP port to connect to
        
                  //Recipients
                  $mail->setFrom(Auth::user()->email, Auth::user()->name);
        
                  $mail->addAddress($email);     // Add a recipient
        
                  //Content
                  $mail->isHTML(true);                                  // Set email format to HTML
                  $mail->AddEmbeddedImage('/var/www/html/intranet3/public/img/calevento.png', 'logo_2u');
                  $mail->Subject = 'Invitación a evento';
                  $mail->Body    =   "
                  <div class='container'>
                  <div style='text-align: center;'>
                  <img src='cid:logo_2u'>
                  </div>
                <div style='text-align: center;'>
                    <p style='text-align: center; font-size: 20px;'><b>".Auth::user()->name."</b> te ha invitado al envento.</p>
                        <p style='text-align: center; font-size: 20px;'><b>".$request->input('title')." </b></p>
                        <p style='text-align: center; font-size: 20px;'>Observación: <b>".$request->input('descripcion')." </b></p>
                        <p style='text-align: center; font-size: 20px;'>Fecha: <b>".date_format($start, 'd/m/Y')." </b></p>
                        <p style='text-align: center; font-size: 20px;'>Hora: <b>". date_format($startime, 'H:i')."hs. </b></p>
                  </div>
              </div>";
    
                  $mail->send();
        
                  
        
              } catch (Exception $e) {
                  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
              }
            }
       
    }
    }
    $calendar->save();
   
          $usuarios =  User::find($request->input('selecMultiple'));

          foreach($usuarios as $user){
            if ($request->input('descripcion') == "") {
              $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
              try {
                  //Server settings                            // Enable verbose debug output
                  $mail->CharSet = 'UTF-8';
                  $mail->isSMTP();                                      // Set mailer to use SMTP
                  $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                  $mail->SMTPAuth = true;                               // Enable SMTP authentication
                  $mail->Username = Auth::user()->email;                 // SMTP username
                  $mail->Password = Auth::user()->contra_mail;           // SMTP password
                  $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                  $mail->Port = 25;                                    // TCP port to connect to
        
                  //Recipients
                  $mail->setFrom(Auth::user()->email, Auth::user()->name);
        
                  $mail->addAddress($user->email);     // Add a recipient
        
                  //Content
                  $mail->isHTML(true);                                  // Set email format to HTML
                  $mail->AddEmbeddedImage('/var/www/html/intranet3/public/img/calevento.png', 'logo_2u');
                  $mail->Subject = 'Invitación a evento';
                  $mail->Body    =   "
                    <div class='container'>
                        <div style='text-align: center;'>
                        <img src='cid:logo_2u'>
                        </div>
                      <div style='text-align: center;'>
                      <p style='text-align: center; font-size: 20px;'><b>".$user->name."</b></p>
                          <p style='text-align: center; font-size: 20px;'><b>".Auth::user()->name."</b> te ha invitado al envento.</p>
                              <p style='text-align: center; font-size: 20px;'><b>".$request->input('title')." </b></p>
                              <p style='text-align: center; font-size: 20px;'>Fecha: <b>".date_format($start, 'd-m-Y')." </b></p>
                              <p style='text-align: center; font-size: 20px;'>Hora: <b>". date_format($startime, 'H:i')."hs. </b></p>
                        </div>
                        <div style='text-align: center;'>
                        <p>Si usted puede participar, por favor confirme su asistencia al evento para que se añada a su calendario</p>
                        <hr>
                        <a style='text-decoration: none;color: #fff;background-color: #9e9e9e;text-align: center;letter-spacing: .5px;-webkit-transition: background-color .2s ease-out;transition: background-color .2s ease-out;cursor: pointer;border: none;border-radius: 2px;display: inline-block;height: 36px;line-height: 36px;padding: 0 16px;text-transform: uppercase;vertical-align: middle;-webkit-tap-highlight-color: transparent;' href='https://intranet.odontopraxis.com.ar:9003/calendar/?invitacion=1&nombre=".encrypt(Auth::user()->name).'&title='.encrypt($request->input('title')).'&descripcion='.encrypt($request->input('descripcion')).'&start='.encrypt(date_format($start, 'Y-m-d').' '.date_format($startime, 'H:i:s')).'&id_usuario='.encrypt(Auth::user()->id)."'>Confirmar</a></p>
                       
                           <p>Si se encuentra fuera de la oficina haga click <a href='https://test.odontopraxis.com.ar:9003/calendar/?invitacion=1&nombre=".encrypt(Auth::user()->name).'&title='.encrypt($request->input('title')).'&descripcion='.encrypt($request->input('descripcion')).'&start='.encrypt(date_format($start, 'Y-m-d').' '.date_format($startime, 'H:i:s')).'&id_usuario='.encrypt(Auth::user()->id)."'>aquí</a></p>
                            
                           </div>
                     </div>";
        
                  $mail->send();
  
              } catch (Exception $e) {
                  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
              }
            }else{
              $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
              try {
                  //Server settings                            // Enable verbose debug output
                  $mail->CharSet = 'UTF-8';
                  $mail->isSMTP();                                      // Set mailer to use SMTP
                  $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
                  $mail->SMTPAuth = true;                               // Enable SMTP authentication
                  $mail->Username = Auth::user()->email;                 // SMTP username
                  $mail->Password = Auth::user()->contra_mail;           // SMTP password
                  $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
                  $mail->Port = 25;                                    // TCP port to connect to
        
                  //Recipients
                  $mail->setFrom(Auth::user()->email, Auth::user()->name);
        
                  $mail->addAddress($user->email);     // Add a recipient
        
                  //Content
                  $mail->isHTML(true);                                  // Set email format to HTML
                  $mail->AddEmbeddedImage('/var/www/html/intranet3/public/img/calevento.png', 'logo_2u');
                  $mail->Subject = 'Invitación a evento';
                  $mail->Body    =   "
                  <div class='container'>
                  <div style='text-align: center;'>
                  <img src='cid:logo_2u'>
                  </div>
                <div style='text-align: center;'>
                <p style='text-align: center; font-size: 20px;'><b>".$user->name."</b></p>
                    <p style='text-align: center; font-size: 20px;'><b>".Auth::user()->name."</b> te ha invitado al envento.</p>
                        <p style='text-align: center; font-size: 20px;'><b>".$request->input('title')." </b></p>
                        <p style='text-align: center; font-size: 20px;'>Observación: <b>".$request->input('descripcion')." </b></p>
                        <p style='text-align: center; font-size: 20px;'>Fecha: <b>".date_format($start, 'd/m/Y')." </b></p>
                        <p style='text-align: center; font-size: 20px;'>Hora: <b>". date_format($startime, 'H:i')."hs. </b></p>
                  </div>
                  <div style='text-align: center;'>
                  <p>Si usted puede participar, por favor confirme su asistencia al evento para que se añada a su calendario</p>
                  <hr>
                  <a style='text-decoration: none;color: #fff;background-color: #9e9e9e;text-align: center;letter-spacing: .5px;-webkit-transition: background-color .2s ease-out;transition: background-color .2s ease-out;cursor: pointer;border: none;border-radius: 2px;display: inline-block;height: 36px;line-height: 36px;padding: 0 16px;text-transform: uppercase;vertical-align: middle;-webkit-tap-highlight-color: transparent;' href='https://intranet.odontopraxis.com.ar:9003/calendar/?invitacion=1&nombre=".encrypt(Auth::user()->name).'&title='.encrypt($request->input('title')).'&descripcion='.encrypt($request->input('descripcion')).'&start='.encrypt(date_format($start, 'Y-m-d').' '.date_format($startime, 'H:i:s')).'&id_usuario='.encrypt(Auth::user()->id)."'>Confirmar</a></p>
                       
                  <p>Si se encuentra fuera de la oficina haga click <a href='https://test.odontopraxis.com.ar:9003/calendar/?invitacion=1&nombre=".encrypt(Auth::user()->name).'&title='.encrypt($request->input('title')).'&descripcion='.encrypt($request->input('descripcion')).'&start='.encrypt(date_format($start, 'Y-m-d').' '.date_format($startime, 'H:i:s')).'&id_usuario='.encrypt(Auth::user()->id)."'>aquí</a></p>
                  </div>
               </div>";
        
                  $mail->send();
  
              } catch (Exception $e) {
                  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
              }
            }
         
          }
          return back()->with('success', 'Evento agregado correctamente');
        }#else

    }#store
    
    public function create(Request $request)
    {
      
      // $title = $request->title;
      // $descripcion = $request->descripcion;
      // $start = $request->start;
      // $id_usuario = $request->id_usuario;
      
      // if(DB::table('calendars')->where('id_usuario', $id_usuario)->where('title', $title)->where('start', $start)->where('descripcion', $descripcion)->exists()){
      //   return 'hola';
      // }else{
      //   $calendar = new Calendar;

      //     $calendar->id_usuario = Auth::user()->id;
      //     $calendar->title = $request->title;
      //     if ($request->descripcion == "") {
      //       $calendar->descripcion = 'Sin descripción';
      //     }else {
      //       $calendar->descripcion = $request->descripcion;
      //     }
      //     $calendar->start = $request->start;

      //     $calendar->save();
      
      //     return response()->json('Carga generada exitosamente.');
      // }
    
    //   $eventos = Calendar::where('id_usuario', Auth::user()->id)->get();
    //   $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

    //   $usuarios = User::all();
    //  return view('calendario.creacal', compact(['notificacion']));
   
    }

    public function mostrar(Request $request)
    {
      //dump('Mostrar');
      $title = decrypt($request->title);
      if (decrypt($request->descripcion) == '') {
        $descripcion = 'Sin descripción';
      }else{
        $descripcion = decrypt($request->descripcion);
      }
      $start = decrypt($request->start);
      $id_usuario = decrypt($request->id_usuario);

      $arrey = ['title'=>$title, 'descripcion' => $descripcion, 'start' => $start, 'id_usuario' => $id_usuario];
      // dump($arrey);
      $usuario = User::find($id_usuario);
      $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

      $existe = DB::table('calendars')
      ->where('id_usuario', Auth::user()->id)
      ->where('title', $title)
      ->where('start', $start)
      ->where('descripcion', $descripcion)
      ->count();

        return view('calendario.creacal', compact(['usuario', 'notificacion', 'arrey', 'existe']));

      
    }
    public function show(Request $request)
    {

      $title = decrypt($request->title);
      if (decrypt($request->descripcion) == '') {
        $descripcion = 'Sin descripción';
      }else{
        $descripcion = decrypt($request->descripcion);
      }
      $start = decrypt($request->start);
      $id_usuario = decrypt($request->id_usuario);

      $arrey = ['title'=>$title, 'descripcion' => $descripcion, 'start' => $start, 'id_usuario' => $id_usuario];
      $usuario = User::find($id_usuario);
      $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

      $existe = DB::table('calendars')
      ->where('id_usuario', Auth::user()->id)
      ->where('title', $title)
      ->where('start', $start)
      ->where('descripcion', $descripcion)
      ->count();

        return view('calendario.creacal', compact(['usuario', 'notificacion', 'arrey', 'existe']));

      
    }
    public function guardar(Request $request)
    {
      $title = $request->title;
      if ($request->descripcion == '') {
        $descripcion = 'Sin descripción';
      }else{
        $descripcion = $request->descripcion;
      }
      $start = $request->start;
      $id_usuario = $request->id_usuario;
      
      if($calendar = DB::table('calendars')->where('id_usuario', Auth::user()->id)->where('title', $title)->where('start', $start)->where('descripcion', $descripcion)->first()){
        return response()->json((object)[
          'errMsg' => 'Ya tienes el mismo evento cargado.',
          'eventID' => $calendar->id,
        ], 405);
       
      }else{
        $calendar = new Calendar;

          $calendar->id_usuario = Auth::user()->id;
          $calendar->title = $request->title;
          if ($request->descripcion == "") {
            $calendar->descripcion = 'Sin descripción';
          }else {
            $calendar->descripcion = $request->descripcion;
          }
          $calendar->start = $request->start;

          $calendar->save();
      
          return response()->json('Carga generada exitosamente.');
      }
    
    //   $eventos = Calendar::where('id_usuario', Auth::user()->id)->get();
    //   $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

    //   $usuarios = User::all();
    //  return view('calendario.creacal', compact(['notificacion']));
    }

    public function destroy(Request $request, $id)
    {
      if ($request->ajax()) {
        $evento = Calendar::find($id);
        $evento->delete();

        return response()->json([
          'success' => 'Borrado correctamente',
        ]);
      }
    }

    public function invitarAmigo(Request $request)
    {


        $evento = Calendar::find($request->idevento);


        $usuario  = User::find($request->idusuario);

        $arrInvitado = User::find($request->invitados);

        $start = date_create($evento->start);

        foreach ($arrInvitado as $invitado) {

          $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
          try {
              //Server settings                            // Enable verbose debug output
              $mail->CharSet = 'UTF-8';
              $mail->isSMTP();                                      // Set mailer to use SMTP
              $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
              $mail->SMTPAuth = true;                               // Enable SMTP authentication
              $mail->Username =  $usuario->email;                 // SMTP username
              $mail->Password =  $usuario->contra_mail;           // SMTP password
              $mail->SMTPSecure = 'null';                            // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 25;                                    // TCP port to connect to
    
              //Recipients
              $mail->setFrom( $usuario->email,  $usuario->name);
    
              $mail->addAddress($invitado->email);     // Add a recipient
    
              //Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->AddEmbeddedImage('/var/www/html/intranet3/public/img/calevento.png', 'logo_2u');
              $mail->Subject = 'Invitación a evento';
              $mail->Body    =   "
              <div class='container'>
              <div style='text-align: center;'>
              <img src='cid:logo_2u'>
              </div>
            <div style='text-align: center;'>
            <p style='text-align: center; font-size: 20px;'><b>".$invitado->name."</b></p>
                <p style='text-align: center; font-size: 20px;'><b>".$usuario->name."</b> te ha invitado al envento.</p>
                    <p style='text-align: center; font-size: 20px;'><b>".$evento->title." </b></p>
                    <p style='text-align: center; font-size: 20px;'>Observación: <b>".$evento->descripcion." </b></p>
                    <p style='text-align: center; font-size: 20px;'>Fecha: <b>".date_format($start, 'd/m/Y')." </b></p>
                    <p style='text-align: center; font-size: 20px;'>Hora: <b>". date_format($start, 'H:i')."hs. </b></p>
              </div>
              <div style='text-align: center;'>
              <p>Si usted puede participar, por favor confirme su asistencia al evento para que se añada a su calendario</p>
              <hr>
              <a style='text-decoration: none;color: #fff;background-color: #9e9e9e;text-align: center;letter-spacing: .5px;-webkit-transition: background-color .2s ease-out;transition: background-color .2s ease-out;cursor: pointer;border: none;border-radius: 2px;display: inline-block;height: 36px;line-height: 36px;padding: 0 16px;text-transform: uppercase;vertical-align: middle;-webkit-tap-highlight-color: transparent;' href='https://intranet.odontopraxis.com.ar:9003/calendar/?invitacion=1&nombre=".encrypt($usuario->name).'&title='.encrypt($evento->title).'&descripcion='.encrypt($evento->descripcion).'&start='.encrypt($evento->start).'&id_usuario='.encrypt($usuario->id)."'>Confirmar</a></p>
                   
              <p>Si se encuentra fuera de la oficina haga click <a href='https://test.odontopraxis.com.ar:9003/calendar/?invitacion=1&nombre=".encrypt($usuario->name).'&title='.encrypt($evento->title).'&descripcion='.encrypt($evento->descripcion).'&start='.encrypt($evento->start).'&id_usuario='.encrypt($usuario->id)."'>aquí</a></p>
              </div>
           </div>";
    
              $mail->send();
            
          } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

        }


return response()->json([
'message' => 'Invitación enviada correctamente.',
], 201);

    }

public function exportEvent(Request $request){
  $events = Calendar::where('id_usuario', Auth::user()->id)
  ->where('isrecordatory', null)
  ->whereBetween('start', [$request->deevento, $request->hastaevento])
  ->orderBy('start', 'asc')
  ->get();
  $data = ['data'=>$events];
  $pdf = PDF::loadView('pdf.eventos', $data);
  return $pdf->download('Eventos'.date('hisddmmYY').'.pdf');
}

}