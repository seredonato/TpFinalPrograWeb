<?php

class TransaffController
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
        $data["login"] = $this->loginModel->ifSesionIniciada();
        if (isset($_SESSION["nombreUsuario"])) {
            $rol = $this->loginModel->getRolDeUsuario($_SESSION["nombreUsuario"]);

            $valorDelRol = $this->loginModel->confirmarRolUsuario($rol);

            $valorAdmin = $this->loginModel->confirmarAdmin($valorDelRol);
            $valorChofer = $this->loginModel->confirmarChofer($valorDelRol);
            $valorMecanico = $this->loginModel->confirmarMecanico($valorDelRol);
            $valorSupervisor = $this->loginModel->confirmarSupervisor($valorDelRol);

            $data["valorAdmin"] = $valorAdmin;
            $data["valorChofer"] = $valorChofer;
            $data["valorMecanico"] = $valorMecanico;
            $data["valorSupervisor"] = $valorSupervisor;
        }

        echo $this->render->render("view/inicio.php", $data);
    }

}