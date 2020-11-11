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

        $email = $_POST["email"];

        $contrasenia = $_POST["contrasenia"];

        $result = $this->loginModel->loguearUsuario($email, $contrasenia);

        $data["login"] = $result;

        $data["nombre"] = $_SESSION["nombreUsuario"];

        echo $this->render->render("view/inicio.php", $data);

    }


    public function desloguearse()

    {
        session_destroy();
        echo $this->render->render("view/inicio.php");
    }

}