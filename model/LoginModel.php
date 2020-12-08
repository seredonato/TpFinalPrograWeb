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

            if ($table[$i]["usuario"] == $nombreUsuario) {
                if ($table[$i]["contrasenia"] == $contraseniaEncriptada) {

                    $_SESSION["logueado"] = true;
                    $result["logueado"] = true;
                    return $result;
                } else {
                    $result["contraseñaIncorrecta"] = true;
                    return $result;

                }
            } else {
                $result["usuarioIncorrecto"] = true;

            }

        }
        $result["logueado"] = false;
        return $result;

    }

    public function getRolDeUsuario($nombreDeUsuario)
    {

        $rol = $this->database->devolverUnUsuarioPorNombreDeUsuario($nombreDeUsuario);

        return $rol;


    }

    public function confirmarRolUsuario($rol)
    {

        if ($rol == "admin") {

            return 1;

        } elseif ($rol == "chofer") {

            return 2;

        } elseif ($rol == "mecanico") {

            return 3;

        } elseif ($rol == "supervisor") {

            return 4;

        } else {
            return 0;
        }

    }

    public function confirmarAdmin($rol)
    {

        if ($rol == 1) {
            return true;
        } else {
            return false;
        }

    }

    public function confirmarChofer($rol)
    {
        if ($rol == 2) {
            return true;
        } else {
            return false;
        }

    }

    public function confirmarMecanico($rol)
    {
        if ($rol == 3) {
            return true;
        } else {
            return false;
        }

    }

    public function confirmarSupervisor($rol)
    {
        if ($rol == 4) {
            return true;
        } else {
            return false;
        }

    }

    public function ifSesionIniciada()
    {
        return isset($_SESSION["logueado"]);
    }


    public function desloguearUsuario()
    {
        session_destroy();
    }

    public function actualizarViajes(){
        $this->database->actualizarViajes();
    }
}