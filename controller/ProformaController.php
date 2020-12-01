<?php


class ProformaController
{
    private $render;
    private $loginModel;
    private $pedidoModel;
    private $choferModel;
    private $imoClassModel;
    private $imoSubClassModel;
    private $proformaModel;

    public function __construct($render, $loginModel, $pedidoModel, $choferModel, $imoClassModel, $imoSubClassModel, $proformaModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->pedidoModel = $pedidoModel;
        $this->choferModel = $choferModel;
        $this->imoClassModel = $imoClassModel;
        $this->imoSubClassModel = $imoSubClassModel;
        $this->proformaModel = $proformaModel;
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

        $data["imoClases"] = $this->imoClassModel->mostrarImoClases();

        $data["imoSubClases"] = $this->imoSubClassModel->mostrarImoSubClass();


        echo $this->render->render("view/proformaView.php", $data);
    }

    public function guardarProforma()
    {
        $idPedido = $_GET["id"];
        $origen = $_POST["origen"];
        $destino = $_POST["destino"];
        $fechaCarga = $_POST["fechaCarga"];
        $horaCarga = $_POST["horaCarga"];
        $fechaLlegada = $_POST["fechaLlegada"];
        $horaLlegada = $_POST["horaLlegada"];
        $tipo = $_POST["tipo"];
        $peso = $_POST["peso"];
        $hazardSi = $_POST["hazardSi"];
        $imoClass = $_POST["imoClass"];
        $imoSubClass = $_POST["imoSubClass"];
        $temperaturaSi = $_POST["temperaturaSi"];
        $temperatura =$_POST["temperatura"];
        $kilometros = $_POST["kilometros"];
        $combustible = $_POST["combustible"];
        $horaSalida = $_POST["horaSalida"];
        $viaticos = $_POST["viaticos"];
        $peajes = $_POST["peajes"];
        $extras = $_POST["extras"];
        $hazardClass = $_POST["hazardClass"];
        $reeferCosto = $_POST["reeferCosto"];
        $fee = $_POST["fee"];
        $total = $_POST["total"];

        $idViaje = $this->proformaModel->guardarViajeReturneaId($origen, $destino, $fechaCarga, $horaCarga, $fechaLlegada, $horaLlegada);
        $idCarga = $this->proformaModel->guardarCargaReturneaId($tipo, $peso, $hazardSi, $imoClass, $imoSubClass, $temperaturaSi, $temperatura);
        $idCosteoEstimado = $this->proformaModel->guardarCosteoEstimadoReturneaId($kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes, $extras, $hazardSi, $hazardClass, $reeferCosto, $fee, $total);
        $idChofer = $_POST["choferElegido"];
        $this->proformaModel->enlazarProformaATablas($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer);
        echo $this->render->render("view/listaPedidosView.php");


    }

}