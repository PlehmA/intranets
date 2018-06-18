<?php

namespace App\Http\Controllers;

use \App\Calendar;
use App\Mail\Invite;
use Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $eventos = \App\Calendar::where('id_usuario', Auth::user()->id)->get();

        return view('calendario.calendar', compact('eventos'));

    }

    public function store(Request $request)
    {
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

      $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
      try {
          //Server settings
          $mail->SMTPDebug = 2;                                  // Enable verbose debug output
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
          $mail->Subject = 'Invitación a evento';
          $mail->Body    =   "<div class='container'>
              <div style='text-align: center;'>
                <img src='".asset('images/Recurso1.png')."' alt='>
              </div>
                <div style='text-align: center;'>
                  <p style='text-align: center; font-size: 20px;'><b>".Auth::user()->name."</b> te ha invitado a participar de un envento.</p>
                      <p style='text-align: center; font-size: 20px;'>Nombre del evento: <b>".$request->input('title')." </b></p>
                      <p style='text-align: center; font-size: 20px;'>Descripción del evento: <b>".$request->input('descripcion')." </b></p>
                      <p style='text-align: center; font-size: 20px;'>Fecha del evento: <b>".date_format($start, 'd/m/Y')." </b></p>
                      <p style='text-align: center; font-size: 20px;'>Hora del evento: <b>". date_format($startime, 'H:i')."hs. </b></p>
                </div>
            </div>";

          $mail->send();

      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }
}
}
$calendar->save();
return back()->with('success', 'Evento agregado correctamente');
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
}
