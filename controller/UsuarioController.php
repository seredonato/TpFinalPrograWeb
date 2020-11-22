<?php


class UsuarioController
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
        echo $this->render->render("view/listaUsuariosView.php", $data);

    }

    public function modificarRolUsuario(){

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $idUsuario = $_POST["id"];
        $rol = $_POST["rol"];

        $this->usuarioModel->modificarRolUsuario($idUsuario, $rol);

        $data["usuarios"] = $this->usuarioModel->mostrarUsuarios();

        echo $this->render->render("view/listaUsuariosView.php", $data);


    }

    public function eliminarUsuario(){

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $id = $_GET["id"];

        $this->usuarioModel->eliminarUsuario($id);

        $data["usuarios"] = $this->usuarioModel->mostrarUsuarios();

        echo $this->render->render("view/listaUsuariosView.php", $data);

    }
}