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

        $_SESSION["logueado"] = $result;

        $data["login"] = $_SESSION["logueado"];

        echo $this->render->render("view/inicio.php", $data);

    }


    public function desloguearse()
    {
        $this->loginModel->desloguearUsuario();
        echo $this->render->render("view/inicio.php");
    }

}