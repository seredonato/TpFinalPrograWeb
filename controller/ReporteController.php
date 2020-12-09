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

    public function guardarReporte()
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
        $fee = $_POST["fee"];
        $latitud = $_POST["latitud"];
        $longitud = $_POST["longitud"];

        $resultado = $this->reporteModel->verificarSiYaHizoReporte($idViaje);

        if($resultado > 0) {
            $resultado2 = "Ya ha realizado un reporte en el día de la fecha sobre este viaje";
            $data["reporteError"] = $resultado2;
            echo $this->render->render("view/enviarQrView.php", $data);
        }elseif($resultado == 0){
            $this->reporteModel->guardarReporte($idViaje, $kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes,
                $extras, $fee, $latitud, $longitud);
            echo $this->render->render("view/inicio.php", $data);

        }
    }
}