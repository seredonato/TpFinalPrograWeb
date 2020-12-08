<?php

class LoginController

{

    private $render;

    private $loginModel;


    public function __construct($render, $loginModel)

    {

        $this->render = $render;

        $this->loginModel = $loginModel;

    }


    public function execute()

    {
        echo $this->render->render("view/loginView.php");
    }


    public function login()

    {

        $nombreUsuario = $_POST["nombreUsuario"];

        $contrasenia = $_POST["contrasenia"];

        $result = $this->loginModel->loguearUsuario($nombreUsuario, $contrasenia);

        if (isset($result["logueado"]) && $result["logueado"] == true) {
            $rol = $this->loginModel->getRolDeUsuario($nombreUsuario);

            $this->loginModel->actualizarViajes();

            $_SESSION["nombreUsuario"] = $nombreUsuario;
            $_SESSION["logueado"] = $result["logueado"];

            $valorDelRol = $this->loginModel->confirmarRolUsuario($rol);

            $valorAdmin = $this->loginModel->confirmarAdmin($valorDelRol);
            $valorChofer = $this->loginModel->confirmarChofer($valorDelRol);
            $valorMecanico = $this->loginModel->confirmarMecanico($valorDelRol);
            $valorSupervisor = $this->loginModel->confirmarSupervisor($valorDelRol);

            $data["valorAdmin"] = $valorAdmin;
            $data["valorChofer"] = $valorChofer;
            $data["valorMecanico"] = $valorMecanico;
            $data["valorSupervisor"] = $valorSupervisor;

            $data["login"] = $_SESSION["logueado"];

            echo $this->render->render("view/inicio.php", $data);
        } elseif (isset($result["usuarioIncorrecto"]) && $result["usuarioIncorrecto"] == true) {

            $data["errorUsuario"] = $result["usuarioIncorrecto"];
            echo $this->render->render("view/inicio.php", $data);

        } elseif (isset($result["contraseñaIncorrecta"]) && $result["contraseñaIncorrecta"] == true) {

            $data["errorContraseña"] = $result["contraseñaIncorrecta"];
            echo $this->render->render("view/inicio.php", $data);

        }
    }


    public function desloguearse()
    {
        $this->loginModel->desloguearUsuario();
        echo $this->render->render("view/inicio.php");
    }

}