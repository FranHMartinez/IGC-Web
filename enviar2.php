<?php

     $nombre=$_POST["nombre"];
     $correo=$_POST["correo"];
     $telefono=$_POST["telefono"];
     $mensaje=$_POST["mensaje"];

    $body = "Nombre: ".$nombre."\nCorreo: ".$correo."\nTelefono: ".$telefono."\nMensaje: ".$mensaje;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Phpmailer/Exception.php';
require 'Phpmailer/PHPMailer.php';
require 'Phpmailer/SMTP.php';

$mail = new PHPMailer();

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'igcmailersmtp@gmail.com';                     // SMTP username
    $mail->Password   = 'ZaQuitauttoness';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('igcmailersmtp@gmail.com', $nombre);
    $mail->addAddress('mefis.sp@gmail.com');     // Add a recipient

    // Content
    $mail->isHTML(true);                            // Set email format to HTML
    $mail->Subject = 'Consulta desde página WEB';
    $mail->Body    = $body;
    $mail->CharSet = 'UTF-8';
    $mail->send();

    echo 
        '<script> 
            alert("El mensaje se envío correctamente");
            window.history.go(-1);
        </script>';
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
}
