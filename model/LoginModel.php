<?php

class LoginModel

{


    private $database;


    public function __construct($database)

    {

        $this->database = $database;

    }


    public function loguearUsuario($email, $contrasenia)

    {

        $contraseniaEncriptada = md5($contrasenia);

        $table = $this->database->devolverUsuarios();

        for ($i = 0; $i < sizeof($table); $i++) {

            if ($table[$i]["email"] == $email && $table[$i]["contrasenia"] == $contraseniaEncriptada) {

                $_SESSION["nombreUsuario"] = $table[$i]["usuario"];

                $_SESSION["email"] = $email;

                $_SESSION["logueado"] = 1;

                return true;

            }

        }

        return false;

    }

}