<?php


class ReporteController
{
    private $render;
    private $loginModel;
    private $reporteModel;

    public function __construct($render, $loginModel, $reporteModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->reporteModel = $reporteModel;
    }

    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        echo $this->render->render("view/inicio.php", $data);
    }

    public function guardarCosteo()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $idViaje = $_GET["idViaje"];
        $kilometros = $_POST["kilometros"];
        $combustible = $_POST["combustible"];
        $horaSalida = $_POST["horaSalida"];
        $horaLlegada = $_POST["horaLlegada"];
        $viaticos = $_POST["viaticos"];
        $peajes = $_POST["peajes"];
        $extras = $_POST["extras"];
        $hazardClass = $_POST["hazardClass"];
        $reeferCosto = $_POST["reeferCosto"];
        $fee = $_POST["fee"];
        $latitud = $_POST["latitud"];
        $longitud = $_POST["longitud"];

        $this->reporteModel->guardarCosteoFinal($idViaje, $kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes,
            $extras, $hazardClass, $reeferCosto, $fee, $latitud, $longitud);

        echo $this->render->render("view/inicio.php", $data);
    }
}