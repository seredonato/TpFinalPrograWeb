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
        $data["pedidoNombre"] = $pedido["nombre_cliente"];
        $data["pedidoFecha"] = $pedido["fecha_pedido"];
        $data["pedidoCuit"] = $pedido["cuit_cliente"];
        $data["pedidoEmail"] = $pedido["email_cliente"];
        $data["pedidoTelefono"] = $pedido["telefono_cliente"];
        $data["pedidoDireccion"] = $pedido["direccion_cliente"];
        $data["pedidoContacto1"] = $pedido["contacto1"];
        $data["pedidocontacto2"] = $pedido["contacto2"];

        $data["choferes"] = $this->choferModel->mostrarChoferes();

        $data["imoClases"]  = $this->imoClassModel->mostrarImoClases();

        $data["imoSubClases"] = $this->imoSubClassModel->mostrarImoSubClass();


        echo $this->render->render("view/proformaView.php", $data);
    }

    public function guardarProforma(){



    }
}