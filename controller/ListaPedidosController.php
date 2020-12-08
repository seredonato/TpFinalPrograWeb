<?php


class ListaPedidosController
{
    private $render;
    private $loginModel;
    private $pedidoModel;


    public function __construct($render,$loginModel,$pedidoModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->pedidoModel = $pedidoModel;

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
            $data["login"] = $this->loginModel->ifSesionIniciada();
            if($valorDelRol == 1 || $valorDelRol == 4) {
                $data["pedidos"] = $this->pedidoModel->mostrarPedidos();
                echo $this->render->render("view/listaPedidosView.php", $data);
            } else{
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }

    }

}