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

        if (isset($_SESSION["nombreUsuario"])) {
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

            if ($valorDelRol == 4) {

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
            }else {
                echo $this->render->render("view/inicio.php", $data);
            }
        }else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function guardarProforma()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        if (isset($_SESSION["nombreUsuario"])) {
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

            if(isset( $_POST["imoClass"])){
                    $imoClass = $_POST["imoClass"];
            }else{
                $imoClass= "no";
            }
            if(isset( $_POST["imoSubClass"])){
                $imoSubClass = $_POST["imoSubClass"];
            }else{
                $imoSubClass= "no";
            }
            $origen = $_POST["origen"];
            $idPedido = $_GET["id"];
            $destino = $_POST["destino"];
            $fechaCarga = $_POST["fechaCarga"];
            $horaCarga = $_POST["horaCarga"];
            $fechaLlegada = $_POST["fechaLlegada"];
            $horaLlegada = $_POST["horaLlegada"];
            $tipo = $_POST["tipo"];
            $peso = $_POST["peso"];
            $hazardSi = $_POST["hazardSi"];
            $temperaturaSi = $_POST["temperaturaSi"];
            $temperatura = $_POST["temperatura"];
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

            $data["pedidos"] = $this->pedidoModel->mostrarPedidos();
            echo $this->render->render("view/listaPedidosView.php", $data);
        }  else{
            echo $this->render->render("view/inicio.php", $data);
        }
        }  else{
            echo $this->render->render("view/inicio.php", $data);
        }

    }

    public function verFormulario()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        if (isset($_SESSION["nombreUsuario"])) {
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

            if ($valorDelRol == 2) {
                $data["login"] = $this->loginModel->ifSesionIniciada();

                $idViaje = $_GET["idViaje"];
                $data["idViaje"] = $idViaje;

                echo $this->render->render("view/cargarDatosView.php", $data);

            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }

    }
}