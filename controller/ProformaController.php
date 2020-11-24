<?php


class ProformaController
{
    private $render;
    private $loginModel;
    private $pedidoModel;

    public function __construct($render, $loginModel, $pedidoModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->pedidoModel = $pedidoModel;
    }

    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $id = $_GET["id"];
        $pedido = $this->pedidoModel->mostrarPedidoPorId($id);
        $data["pedidoId"] = $pedido["id"];
        $data["pedidoNombre"] = $pedido["nombre"];
        $data["pedidoCuit"] = $pedido["cuit"];
        $data["pedidoEmail"] = $pedido["email"];
        $data["pedidoTelefono"] = $pedido["telefono"];
        $data["pedidoDireccion"] = $pedido["direccion_cliente"];
        $data["pedidoContacto1"] = $pedido["direccion_1"];
        $data["pedidocontacto2"] = $pedido["direccion_2"];

        echo $this->render->render("view/proformaView.php", $data);
    }
}