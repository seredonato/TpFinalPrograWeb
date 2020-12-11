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

    public function eliminarPedido()
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
            if($valorDelRol == 4) {
                $id = $_GET["id"];
                $this->pedidoModel->eliminarPedido($id);
                $data["pedidos"] = $this->pedidoModel->mostrarPedidos();
                echo $this->render->render("view/listaPedidosView.php", $data);
            }else {
                echo $this->render->render("view/inicio.php", $data);
             }
            }   else{
            echo $this->render->render("view/inicio.php", $data);
            }
        }

    public function modificarPedido()
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
            if($valorDelRol == 4) {
                $id = $_POST["id"];
                $nombre = $_POST["nombre"];
                $cuit = $_POST["cuit"];
                $email = $_POST["email"];
                $tel = $_POST["tel"];
                $direccion = $_POST["direccion"];
                $direccionOrigen = $_POST["direccionOrigen"];
                $direccionDestino = $_POST["direccionDestino"];

                $this->pedidoModel->modificarPedido($id,$nombre,$cuit,$email,$tel,$direccion,$direccionOrigen,$direccionDestino);
                $data["pedidos"] = $this->pedidoModel->mostrarPedidos();
                echo $this->render->render("view/listaPedidosView.php", $data);
            }else {
                echo $this->render->render("view/inicio.php", $data);
            }
        }   else{
            echo $this->render->render("view/inicio.php", $data);
        }
    }
}