<?php


class PedidoController
{
    private $render;
    private $pedidoModel;

    public function __construct($render, $pedidoModel)
    {
        $this->render = $render;
        $this->pedidoModel = $pedidoModel;
    }

    public function execute()
    {
        echo $this->render->render("view/inicio.php");
    }

    public function guardarPedido()
    {

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