<?php

class LoginModel

{


    private $database;


    public function __construct($database)

    {

        $this->database = $database;

    }


    public function loguearUsuario($nombreUsuario, $contrasenia)

    {

        $contraseniaEncriptada = md5($contrasenia);

        $table = $this->database->devolverUsuarios();

        for ($i = 0; $i < sizeof($table); $i++) {

            if ($table[$i]["usuario"] == $nombreUsuario && $table[$i]["contrasenia"] == $contraseniaEncriptada) {

                $_SESSION["logueado"] = true; //antes estaba 1

                return true;

            }

        }

        return false;

    }

    public function ifSesionIniciada(){
        return isset($_SESSION["logueado"]);
    }

    public function desloguearUsuario(){
        session_destroy();
    }
}