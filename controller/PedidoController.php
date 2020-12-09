<?php


class PedidoController
{
    private $render;
    private $pedidoModel;
    private $loginModel;

    public function __construct($render, $pedidoModel, $login)
    {
        $this->render = $render;
        $this->pedidoModel = $pedidoModel;
        $this->loginModel = $login;
    }

    public function execute()
    {
        echo $this->render->render("view/inicio.php");
    }

    public function guardarPedido()
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
        }

        $nombreCompleto = $_POST["nombreCompleto"];
        $cuit = $_POST["cuit"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $direccionCliente = $_POST["direccion"];
        $contacto1 = $_POST["contacto1"];
        $contacto2 = $_POST["contacto2"];

        $result = $this->pedidoModel->guardarPedido($nombreCompleto, $cuit, $email, $telefono, $direccionCliente, $contacto1, $contacto2);

            $data["valorPedido"] = true;
            echo $this->render->render("view/inicio.php", $data);
        }


}