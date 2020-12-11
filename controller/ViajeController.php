<?php


class ViajeController
{
    private $costeoFinalModel;
    private $render;
    private $loginModel;
    private $viajeModel;
    private $equipoModel;

    public function __construct($render, $costeoFinalModel, $viajeModel, $loginModel, $equipoMode)
    {
        $this->costeoFinalModel = $costeoFinalModel;
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->viajeModel = $viajeModel;
        $this->equipoModel = $equipoMode;

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

            if ($valorDelRol == 2 || $valorDelRol == 4 ) {


                $nombreUsuario = $_SESSION["nombreUsuario"];
                $data["viajes"] = $this->viajeModel->mostrarViajesAsignadosChofer($nombreUsuario);

                echo $this->render->render("view/viajesView.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function viajesActivos()
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

            if ($valorDelRol == 2 || $valorDelRol == 4) {

                $nombreUsuario = $_SESSION["nombreUsuario"];
                $data["viajesActivos"] = $this->viajeModel->mostrarViajesActivosAsignadosChofer($nombreUsuario);

                echo $this->render->render("view/viajesActivosView.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function viajesPendientes()
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

            if ($valorDelRol == 2 || $valorDelRol == 4) {

                $nombreUsuario = $_SESSION["nombreUsuario"];
                $data["viajesPendientes"] = $this->viajeModel->mostrarViajesPendientesAsignadosChofer($nombreUsuario);

                echo $this->render->render("view/viajesPendientesView.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function viajesFinalizados()
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

            if ($valorDelRol == 2 || $valorDelRol == 4) {

                $nombreUsuario = $_SESSION["nombreUsuario"];
                $data["viajesFinalizados"] = $this->viajeModel->mostrarViajesFinalizadosAsignadosChofer($nombreUsuario);

                echo $this->render->render("view/viajesFinalizadosView.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function empezarViaje()
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

            if ($valorDelRol == 2 || $valorDelRol == 4) {

                $idViaje = $_GET["id"];
                $idEquipo = $_GET["idEquipo"];

                $this->costeoFinalModel->guardarHoraSalidayEstado($idViaje);
                $this->equipoModel->cambiarEstadoNoDisponible($idEquipo);

                $nombreUsuario = $_SESSION["nombreUsuario"];
                $data["viajes"] = $this->viajeModel->mostrarViajesAsignadosChofer($nombreUsuario);

                echo $this->render->render("view/viajesActivosView.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function finalizarViaje()
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

            if ($valorDelRol == 2 || $valorDelRol == 4) {

                $idViaje = $_GET["id"];
                $idEquipo = $_GET["idEquipo"];

                $this->costeoFinalModel->guardarHoraLlegadayEstado($idViaje);
                $this->equipoModel->cambiarEstadoADisponible($idEquipo);
                $this->costeoFinalModel->guardarCosteoFinal($idViaje);

                $nombreUsuario = $_SESSION["nombreUsuario"];
                $data["viajes"] = $this->viajeModel->mostrarViajesAsignadosChofer($nombreUsuario);

                echo $this->render->render("view/viajesView.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }
}