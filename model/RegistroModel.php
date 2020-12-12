<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


class RegistroModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarUsuario($dni, $email, $usuario, $contrasenia, $contrasenia2, $nombre, $apellido, $fecha_nacimiento)
    {
        $usuarioObtenido = $this->database->devolverUsuarioPorUsuario($usuario);
        $emailObtenido = $this->database->devolverEmailPorEmail($email);

        if ($contrasenia == $contrasenia2 && is_null($usuarioObtenido) && is_null($emailObtenido)) {

            $contraseniaEncriptada = md5($contrasenia);

            $sql = "INSERT INTO usuario (dni, email, usuario, contrasenia, nombre, apellido, fecha_nacimiento, rol, tipo_licencia, imagen, estado)
                VALUES (" . $dni . ", '" . $email . "', '" . $usuario . "', '" . $contraseniaEncriptada . "', '" . $nombre . "', '" . $apellido . "', '" . $fecha_nacimiento . "', 'no especificado', 'no aplica' 
                ,'/public/images/logoPerfil.png', 'NO ACTIVO')";

            return $this->database->query($sql);
            exit();
        } else if ($emailObtenido == $email) {

            return "Ya hay una cuenta asociada a este email";
            exit();

        } else if ($usuarioObtenido == $usuario) {

            return "El usuario ya existe";
            exit();

        } else if ($contrasenia != $contrasenia2) {

            return "Las contraseñas no coinciden";
            exit();
        }
    }

    public function enviarMail($email, $usuario){

        $mail = new PHPMailer(true);

            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'transaff2020@gmail.com';                     // SMTP username
            $mail->Password = 'transaff12345';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('transaff2020@gmail.com', 'Transaff');
            $mail->addAddress(''.$email.'');     // Add a recipient;               // Name is optional

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Bienvenido a Transaff';
            $mail->Body = 'Por favor ingrese al siguiente link para poder verificar su cuenta <a href="http://localhost/activar?usuario='.$usuario.'">http://localhost/activar?usuario='.$usuario.'</a>';


            $mail->send();
    }



}