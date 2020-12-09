<?php


class ViajeController
{
    private $costeoFinalModel;
    private $render;
    private $loginModel;
    private $viajeModel;

    public function __construct($render,$costeoFinalModel, $viajeModel, $loginModel)
    {
        $this->costeoFinalModel = $costeoFinalModel;
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->viajeModel = $viajeModel;
    }

    public function execute(){
        $data["login"] = $this->loginModel->ifSesionIniciada();

        $nombreUsuario = $_SESSION["nombreUsuario"];
        $data["viajes"] = $this->viajeModel->mostrarViajesAsignadosChofer($nombreUsuario);

        echo $this->render->render("view/viajesView.php", $data);
    }

    public function viajesActivos(){
        $data["login"] = $this->loginModel->ifSesionIniciada();

        $nombreUsuario = $_SESSION["nombreUsuario"];
        $data["viajesActivos"] = $this->viajeModel->mostrarViajesActivosAsignadosChofer($nombreUsuario);

        echo $this->render->render("view/viajesActivosView.php", $data);
    }

    public function viajesPendientes(){
        $data["login"] = $this->loginModel->ifSesionIniciada();

        $nombreUsuario = $_SESSION["nombreUsuario"];
        $data["viajesPendientes"] = $this->viajeModel->mostrarViajesPendientesAsignadosChofer($nombreUsuario);

        echo $this->render->render("view/viajesPendientesView.php", $data);
    }

    public function viajesFinalizados(){
        $data["login"] = $this->loginModel->ifSesionIniciada();

        $nombreUsuario = $_SESSION["nombreUsuario"];
        $data["viajesFinalizados"] = $this->viajeModel->mostrarViajesFinalizadosAsignadosChofer($nombreUsuario);

        echo $this->render->render("view/viajesFinalizadosView.php", $data);
    }

    public function empezarViaje(){
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $idViaje = $_GET["id"];

        $this->costeoFinalModel->guardarHoraSalidayEstado($idViaje);

        $nombreUsuario = $_SESSION["nombreUsuario"];

        $data["viajes"] = $this->viajeModel->mostrarViajesAsignadosChofer($nombreUsuario);

        echo $this->render->render("view/viajesView.php", $data);
    }

    public function finalizarViaje(){

        $data["login"] = $this->loginModel->ifSesionIniciada();

        $idViaje = $_GET["id"];

        $this->costeoFinalModel->guardarHoraLlegadayEstado($idViaje);
        $this->costeoFinalModel->guardarCosteoFinal($idViaje);

        $nombreUsuario = $_SESSION["nombreUsuario"];
        $data["viajes"] = $this->viajeModel->mostrarViajesAsignadosChofer($nombreUsuario);

        echo $this->render->render("view/viajesView.php", $data);
    }


}