<?php

class RegistroModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarUsuario($dni, $email, $usuario, $contrasenia, $nombre, $apellido, $fecha_nacimiento)
    {
        $contraseniaEncriptada = md5($contrasenia);



        $sql = "INSERT INTO usuario (dni, email, usuario, contrasenia, nombre, apellido, fecha_nacimiento)
                VALUES (" . $dni . ", '" . $email . "', '" . $usuario . "', '" . $contraseniaEncriptada . "', '" . $nombre . "', '" . $apellido . "', '".$fecha_nacimiento."')";
        return $this->database->query($sql);
    }
}