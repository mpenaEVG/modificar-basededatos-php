<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function enviarCorreo($nombreUsuario, $email) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();       
        $mail->Host = 'smtp.gmail.com';                        
        $mail->SMTPAuth = true;                               
        $mail->Username = 'mauri.pea@gmail.com';             
        $mail->Password = getenv('SMTP_PASSWORD');   
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;                                

        //Destinatarios
        $mail->setFrom('mauri.pea@gmail.com', 'Mauri');
        $mail->addAddress($email, $nombreUsuario);  

        //Contenido
        $mail->isHTML(true);                       
        $mail->Subject = 'Registro Exitoso';
        $mail->Body    = "Hola $nombreUsuario, <br><br>Tu registro ha sido exitoso. ¡Bienvenido a nuestro sistema!";
        $mail->AltBody = "Hola $nombreUsuario, \n\nTu registro ha sido exitoso. ¡Bienvenido a nuestro sistema!";  // Texto sin HTML

        //Enviar el correo
        $mail->send();
        echo 'El correo ha sido enviado exitosamente';
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}

