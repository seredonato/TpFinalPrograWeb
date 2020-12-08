<?php


class ProformaController
{
    private $render;
    private $loginModel;
    private $pedidoModel;
    private $usuarioModel;
    private $imoClassModel;
    private $imoSubClassModel;
    private $proformaModel;
    private $equipoModel;
    private $qrModel;

    public function __construct($render, $loginModel, $pedidoModel, $usuarioModel, $imoClassModel, $imoSubClassModel, $proformaModel, $equipoModel, $qrModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->pedidoModel = $pedidoModel;
        $this->usuarioModel = $usuarioModel;
        $this->qrModel = $qrModel;
        $this->imoClassModel = $imoClassModel;
        $this->imoSubClassModel = $imoSubClassModel;
        $this->proformaModel = $proformaModel;
        $this->equipoModel = $equipoModel;
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

        $data["choferes"] = $this->usuarioModel->mostrarChoferes();

        $data["imoClases"] = $this->imoClassModel->mostrarImoClases();

        $data["imoSubClases"] = $this->imoSubClassModel->mostrarImoSubClass();

        $data["equipos"] = $this->equipoModel->mostrarEquipos();


        echo $this->render->render("view/proformaView.php", $data);
    }

    public function guardarProforma()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
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
        $fee = $_POST["fee"];

        $idEquipo = $_POST["equipoElegido"];
        $reeferCosto = $this->proformaModel->devolverCostoReefer($temperaturaSi);

        $idViaje = $this->proformaModel->guardarViajeReturneaId($origen, $destino, $fechaCarga, $horaCarga, $fechaLlegada, $horaLlegada);
        $idCarga = $this->proformaModel->guardarCargaReturneaId($tipo, $peso, $hazardSi, $imoClass, $imoSubClass, $temperaturaSi, $temperatura);
        $idCosteoEstimado = $this->proformaModel->guardarCosteoEstimadoReturneaId($idViaje, $kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes, $extras, $hazardSi, $imoClass, $reeferCosto, $fee);
        $idChofer = $_POST["choferElegido"];
        $this->proformaModel->enlazarProformaATablas($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer, $idEquipo);
        $idProforma = $this->proformaModel->mostrarIdProforma($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer, $idEquipo);

        $this->qrModel->generarQR($idViaje);

        $this->pedidoModel->agregarIdDeLaProforma($idPedido, $idProforma);

        $data["pedidosNoProforma"] = $this->pedidoModel->mostrarPedidosSinProforma();
        $data["pedidosFinalizados"] =$this->pedidoModel->mostrarPedidosFinalizados();
        $data["pedidosPendientes"] = $this->pedidoModel->mostrarPedidosPendientes();
        $data["pedidosActivos"] = $this->pedidoModel->mostrarPedidosActivos();

        echo $this->render->render("view/listaPedidosView.php", $data);
    }

    public function verFormulario(){
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $idViaje =  $_GET["idViaje"];
        $data["idViaje"] = $idViaje;
        $data["imoClases"] = $this->imoClassModel->mostrarImoClases();

        echo $this->render->render("view/cargarDatosView.php", $data);

    }



}