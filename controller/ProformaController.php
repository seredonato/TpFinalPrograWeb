<?php


class ProformaController
{
    private $render;
    private $loginModel;
    private $pedidoModel;
    private $choferModel;
    private $imoClassModel;
    private $imoSubClassModel;

    public function __construct($render, $loginModel, $pedidoModel, $choferModel, $imoClassModel, $imoSubClassModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->pedidoModel = $pedidoModel;
        $this->choferModel = $choferModel;
        $this->imoClassModel = $imoClassModel;
        $this->imoSubClassModel = $imoSubClassModel;
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

        $data["imoClases"]  = $this->imoClassModel->mostrarImoClases();

        $data["imoSubClases"] = $this->imoSubClassModel->mostrarImoSubClass();


        echo $this->render->render("view/proformaView.php", $data);
    }
}