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
            if ($valorDelRol == 2) {
                $idViaje = $_GET["idViaje"];
                $kilometros = $_POST["kilometros"];
                $combustible = $_POST["combustible"];
                $viaticos = $_POST["viaticos"];
                $peajes = $_POST["peajes"];
                $extras = $_POST["extras"];
                $fee = $_POST["fee"];
                $latitud = $_POST["latitud"];
                $longitud = $_POST["longitud"];
                $result = $this->reporteModel->verificarSiYaHizoReporte($idViaje);
                $estadoViaje = $this->reporteModel->verificarEstadoViaje($idViaje);
                if ($estadoViaje == "PENDIENTE"){
                    $data["errorPendiente"] = true;
                    echo $this->render->render("view/enviarQrView.php", $data);
                }elseif ($estadoViaje == "FINALIZADO"){
                    $data["errorFinalizado"] = true;
                    echo $this->render->render("view/enviarQrView.php", $data);
                }
                if ($result == 0) {
                    $this->reporteModel->guardarReporte($idViaje, $kilometros, $combustible, $viaticos, $peajes,
                        $extras, $fee, $latitud, $longitud);
                    echo $this->render->render("view/inicio.php", $data);
                } else {
                    $data["error"] = true;
                    echo $this->render->render("view/enviarQrView.php", $data);
                }
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }

    }
}