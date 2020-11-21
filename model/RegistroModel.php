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
        if ($contrasenia==$contrasenia2&&
            !($this->usuarioExistente($usuario))&&
            !($this->emailExistente($email))){


            $contraseniaEncriptada = md5($contrasenia);


            $sql = "INSERT INTO usuario (dni, email, usuario, contrasenia, nombre, apellido, fecha_nacimiento)
                VALUES (" . $dni . ", '" . $email . "', '" . $usuario . "', '" . $contraseniaEncriptada . "', '" . $nombre . "', '" . $apellido . "', '".$fecha_nacimiento."')";

            return $this->database->query($sql);

        }else if($this->usuarioExistente($usuario)){

            $value ="El usuario ya existe";
            return $value;


        }else if($this->emailExistente($email)){

            $value = "Ya hay una cuenta asociada a este email";
            return $value;


        }else if ($contrasenia!=$contrasenia2) {

            $value = "Las contraseñas no coinciden";
            return $value;

        }
    }


public function usuarioExistente($usuario){

        $sql = 'SELECT usuario FROM usuario WHERE usuario LIKE "' . $usuario . '"';
        $resultado = $this->database->query($sql);
        if ($resultado){
            return true;
        }return false;
}

public function emailExistente($email){

    $sql = 'SELECT email FROM usuario WHERE email LIKE "' . $email . '"';
    $resultado = $this->database->query($sql);
    if ($resultado){
        return true;
    }return false;

}


}