<?php

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


            $sql = "INSERT INTO usuario (dni, email, usuario, contrasenia, nombre, apellido, fecha_nacimiento, rol, tipo_licencia, imagen)
                VALUES (" . $dni . ", '" . $email . "', '" . $usuario . "', '" . $contraseniaEncriptada . "', '" . $nombre . "', '" . $apellido . "', '" . $fecha_nacimiento . "', 'no especificado', 'no aplica' ,'/public/images/logoPerfil.png')";

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





}