<?php 

//Importa PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Incluye el autoload de Composer
require 'vendor/autoload.php';

//Verifica si se envio el form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Obtiene los datos
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $asunto = $_POST['subject'];
    $mensaje = $_POST['message'];

    //Instancia PHPMAILER
    $mail = new PHPMailer(true);

    try {
        //Config del Servidor SMTP
        $mail->isSMTP(); //Enviar usando SMTP
        $mail->Host = 'smtp.gmail.com'; //Configurar el servidor
        $mail->SMTPAuth = true; //Habilita la auth
        $mail->Username = 'pablogarciag21@gmail.com'; //SMTP Username
        $mail->Password = '18041998MCR'; //SMTP Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Habilita encriptación TLS
        $mail->Port = 587; //TCP Port a conectarse

        //Desactiva la ver. de crt
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' =>false,
                'allow_self_signed' => true
            )
            );

        //Config dest
        $mail->setFrom('pablogarciag21@gmail.com', 'PHP');
        $mail->addAddress('pablogarciag21@gmail.com','Pablo');

        //Mail content
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = "Nombre: $nombre <br> Correo: $email <br><br> Message: $mensaje";
        $mail->AltBody = "Nombre: $nombre\n Correo: $email\n\nMensaje\n: $mensaje";

        //SEND MAIL
        $mail->send();
        echo 'Enviado';

    } catch (Exception $e) {
        echo "No se envio el mensaje, error: {$mail->ErrorInfo}";
    }
}
?>