<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/var/www/html/intranet3/vendor/autoload.php';

$dbconn = pg_connect("host=192.168.0.5 port=5432 dbname=intranet user=postgres password=Odon1234");
//conectarse a una base de datos llamada "mary" en el host "sheep" con el nombre de usuario y password

if (!$dbconn) {
    echo "No se ha podido conectar a la base de datos.\n";
    exit;
}
$actualDate = date('Y-m-d');

$result = pg_query($dbconn, "SELECT id_usuario FROM calendars where start='".$actualDate."' group by id_usuario");

if(!$result) {
    echo "No se ha podido ejecutar la query.\n";
    exit;
}

while($arr = pg_fetch_assoc($result)){

$find = pg_query($dbconn, "SELECT email, name FROM users where id=".$arr['id_usuario']);

$resource = pg_fetch_object($find);

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';                                      // Set mailer to use SMTP
    $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
    $mail->Password = 'Newsist2018';                           // SMTP password
    $mail->SMTPSecure = null;                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
    $mail->addAddress($resource->email, $resource->name);     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->AddEmbeddedImage('/var/www/html/intranet3/public/images/Isologotipo.png', 'logo_2u');
    $mail->Subject = $resource->name.' - Tienes eventos programados para hoy.';
    $mail->Body    = "<center>
    <img src='cid:logo_2u' style='margin:auto; display:block; text-align: center;'>
    <div style='text-align: center;'><h2>Buen día $resource->name</h2></div>
    <div style='text-align: center;'><h4>Tienes eventos programados para hoy.</h4></div>
    <div style='text-align: center;'><p>Para verlos ingrese <a href='https://intranet.odontopraxis.com.ar:9003/calendar'>aquí</a>.</p></div>
    <div style='text-align: center;'><p>Si se encuentra afuera, ingrese <a href='https://test.odontopraxis.com.ar:9003/calendar'>aquí</a>.</p></div>
    </center>
    ";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}



}// primer while



?>