<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$dbconn = pg_connect("host=192.168.0.5 port=5432 dbname=intranet user=postgres password=Odon1234");
//conectarse a una base de datos llamada "mary" en el host "sheep" con el nombre de usuario y password

if (!$dbconn) {
    echo "No se ha podido conectar a la base de datos.\n";
    exit;
}

$result = pg_query($dbconn, "SELECT * FROM calendars");
if (!$result) {
    echo "No se ha podido ejecutar la query.\n";
    exit;
}



while($arr = pg_fetch_assoc($result)){


$find = pg_query($dbconnm, "SELECT email FROM users where id=".$arr['id_usuario']);

//$result = collect($result)->groupBy('id_usuario');

$result = pg_query($dbconn, "SELECT id_usuario FROM calendars where start='".$actualDate."' group by id_usuario");

if (!$result) {
    echo "No se ha podido ejecutar la query.\n";
    exit;
}



while($arr = pg_fetch_assoc($result)){

$find = pg_query($dbconn, "SELECT email, name FROM users where id=".$arr['id_usuario']);

$resource = pg_fetch_object($find);

echo $resource->email, $resource->name;

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
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
    $mail->Subject = 'Tienes eventos programados para hoy.';
    $mail->Body    = 'Creo que funciona';
    $mail->AltBody = 'Besos';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}



}// primer while
}


?>