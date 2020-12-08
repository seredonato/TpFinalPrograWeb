<?php


class ListaPedidosController
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

        $data["pedidos"] = $this->pedidoModel->mostrarPedidos();

        echo $this->render->render("view/listaPedidosView.php", $data);
    }

    public function pedidosPendientes()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();

        $data["pedidosPendientes"] = $this->pedidoModel->mostrarPedidosPendientes();

        echo $this->render->render("view/listaPedidosPendientesView.php", $data);
    }

    public function pedidosActivos()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();

        $data["pedidosActivos"] = $this->pedidoModel->mostrarPedidosActivos();

        echo $this->render->render("view/listaPedidosActivosView.php", $data);
    }

    public function pedidosFinalizados()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();

        $data["pedidosFinalizados"] = $this->pedidoModel->mostrarPedidosFinalizados();

        echo $this->render->render("view/listaPedidosFinalizadosView.php", $data);
    }

    public function pedidosSinProforma()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();

        $data["pedidosNoProforma"] = $this->pedidoModel->mostrarPedidosSinProforma();

        echo $this->render->render("view/listaPedidosSinProformaView.php", $data);
    }
}