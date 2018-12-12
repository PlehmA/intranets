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
$actualDateTime = date('Y-m-d H:i');

$result = pg_query($dbconn, "SELECT * FROM recordatories where fecha_hora='".$actualDateTime."'");

if(!$result) {
    echo "No se ha podido ejecutar la query.\n";
    exit;
}

while($arr = pg_fetch_assoc($result)){

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();
    //$mail->CharSet = 'UTF-8';                                      // Set mailer to use SMTP
    $mail->Host = 'mail.odontopraxis.com.ar';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sistemas@odontopraxis.com.ar';                 // SMTP username
    $mail->Password = 'Newsist2018';                           // SMTP password
    $mail->SMTPSecure = null;                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('sistemas@odontopraxis.com.ar', 'Uitalk');
    $mail->addAddress($arr['user_email'], $arr['username']);     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->AddEmbeddedImage('/var/www/html/intranet3/public/images/Isologotipo.png', 'logo_2u');
    $mail->Subject = $arr['username'].' - Tienes un recordatorio.';
    $mail->Body    = "<center>
    <img src='cid:logo_2u' style='margin:auto; display:block; text-align: center;'>
    <div style='text-align: center;'><h2>".$arr['username']." tienes un recordatorio</h2></div>
    <div style='text-align: center;'><h4>".$arr['notification_name']."</h4></div>
    <div style='text-align: center;'><p>".$arr['text']."</p></div>
    </center>
    ";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}// While



?>