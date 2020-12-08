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
        $data["pedidosNoProforma"] = $this->pedidoModel->mostrarPedidosSinProforma();
        $data["pedidosFinalizados"] =$this->pedidoModel->mostrarPedidosFinalizados();
        $data["pedidosPendientes"] = $this->pedidoModel->mostrarPedidosPendientes();
        $data["pedidosActivos"] = $this->pedidoModel->mostrarPedidosActivos();

        echo $this->render->render("view/listaPedidosView.php", $data);

    }

}