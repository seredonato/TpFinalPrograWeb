<?php

class ListaUsuarioController
{
    private $render;
    private $usuarioModel;
    private $loginModel;

    public function __construct($render, $usuarioModel, $loginModel)
    {
        $this->render = $render;
        $this->usuarioModel = $usuarioModel;
        $this->loginModel = $loginModel;
    }

    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();

        if ($data["login"]) {
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
            if ($valorDelRol == 1  || $valorDelRol == 4 ) {
                $data["usuarios"] = $this->usuarioModel->mostrarUsuarios();
                echo $this->render->render("view/listaUsuariosView.php", $data);
            } else{
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }



}