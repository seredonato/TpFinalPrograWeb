<?php


class EstadisticasController
{
    private $costeoFinalModel;
    private $render;
    private $loginModel;


    public function __construct($render, $loginModel, $costeoFinalModel)
    {
        $this->costeoFinalModel = $costeoFinalModel;
        $this->render = $render;
        $this->loginModel = $loginModel;

    }

    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();

        if ($data["login"]) {
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


                $idPedido = $_GET["id"];

                $costeoInicial = $this->costeoFinalModel->obtenerCosteoInicialSegunPedido($idPedido);

                $data["kilometrosInicial"] = $costeoInicial["kilometros"];
                $data["combustibleInicial"] = $costeoInicial["combustible"];
                $data["viaticosInicial"] = $costeoInicial["viaticos"];
                $data["peajesInicial"] = $costeoInicial["peajes_pesajes"];
                $data["feeInicial"] = $costeoInicial["fee"];
                $data["extrasInicial"] = $costeoInicial["extras"];

                $costeoFinal = $this->costeoFinalModel->obtenerCosteoFinalSegunPedido($idPedido);

                $data["kilometrosFinal"] = $costeoFinal["kilometros"];
                $data["combustibleFinal"] = $costeoFinal["combustible"];
                $data["viaticosFinal"] = $costeoFinal["viaticos"];
                $data["peajesFinal"] = $costeoFinal["peajes_pesajes"];
                $data["feeFinal"] = $costeoFinal["fee"];
                $data["extrasFinal"] = $costeoFinal["extras"];
                echo $this->render->render("view/estadisticasView.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }
}