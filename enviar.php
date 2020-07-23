<?php

$id=$_POST["id"];
$serial=$_POST["Serial"];
$prove=$_POST["proveedor"];
$esta=$_POST["estado"];
$iden=$_POST["Identificacion"];
$nombre=$_POST["Nombres"];
$ambiente=$_POST["Ambiente"];
$correo=$_POST["Correo"];
$mensaje=$_POST["mensaje"];

$body="IdActivo: " .$id. "<br> Serial: " .$serial. "<br> proveedor: " .$prove. "<br> Estado: " .$esta. "<br> Identificacion: " .$iden. "<br>Nombre: " .$nombre. "<br>Ambiente: " .$ambiente. "<br>Correo: ". $correo . "<br>Mensaje: ". $mensaje; 
 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPmailer/Exception.php';
require 'PHPmailer/PHPMailer.php';
require 'PHPmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'SMTP.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'inventoryweb77@gmail.com';                     // SMTP username
    $mail->Password   = 'johanywilliam';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('johanrodriguezbermudez@gmail.com', $nombre);
    $mail->addAddress('johanrodriguezbermudez@gmail.com', $nombre);     // Add a recipient
    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Solicitud de Activo';
    $mail->Body    = $body;
    $mail->AltBody = 'Registrar prestamo';

    $mail->send();
    echo '<script>
    alert("El mensaje se envio correctamente");
    window.history.go(-1);
    </script>';
} catch (Exception $e) {
    echo 'hubo error al enviar el mensaje:', $mail->ErrorInfo;
}