<?php


class ProformaController
{
    private $render;
    private $loginModel;
    private $pedidoModel;
    private $choferModel;

    public function __construct($render, $loginModel, $pedidoModel, $choferModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->pedidoModel = $pedidoModel;
        $this->choferModel = $choferModel;
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
        $data["choferes"] = $this->choferModel->mostrarChoferes();


        echo $this->render->render("view/proformaView.php", $data);
    }
}