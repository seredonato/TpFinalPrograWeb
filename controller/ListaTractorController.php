<?php


class listaTractorController
{
    private $render;
    private $loginModel;
    private $tractorModel;
    private $calendarioModel;


    public function __construct($render, $loginModel, $tractorModel, $calendarioModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->tractorModel = $tractorModel;
        $this->calendarioModel = $calendarioModel;

    }

    public function registroTractor()
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

            if ($valorDelRol == 3) {
                $data["tractores"] = $this->tractorModel->mostrarTractor();
                $nro_motor = $_POST["nro_motor"];
                $marca = $_POST["marca"];
                $modelo = $_POST["modelo"];
                $kilometraje = $_POST["kilometraje"];
                $patente = $_POST ["patente"];
                $nro_chasis = $_POST ["chasis"];

                $data["tractores"] = $this->tractorModel->mostrarTractor();

                $result = $this->tractorModel->registrarTractor($nro_motor, $marca, $modelo, $kilometraje, $patente, $nro_chasis);


                if ($result == "Patente ya existente") {
                    $data["registroTractorError"] = $result;
                    echo $this->render->render("view/listaTractoresView.php", $data);
                } else {
                    $data["login"] = $this->loginModel->ifSesionIniciada();
                    $data["tractores"] = $this->tractorModel->mostrarTractor();
                    echo $this->render->render("view/listaTractoresView.php", $data);
                }
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
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

            if ($valorDelRol == 3 || $valorDelRol == 4) {
                $data["tractores"] = $this->tractorModel->mostrarTractor();

                echo $this->render->render("view/listaTractoresView.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function modificarTractor()
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

            if ($valorDelRol == 3) {

                $id = $_POST["id"];
                $marca = $_POST["marca"];
                $modelo = $_POST["modelo"];
                $nro_motor = $_POST["nro_motor"];
                $patente = $_POST["patente"];
                $chasis = $_POST["chasis"];
                $result = $this->tractorModel->modificarTractor($id, $marca, $modelo, $nro_motor, $patente, $chasis);

                $data["tractores"] = $this->tractorModel->mostrarTractor();
                echo $this->render->render("view/listaTractoresView.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }


    public function eliminarTractor()
    {

        $id = $_GET["id"];
        $this->tractorModel->eliminarTractor($id);
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["tractores"] = $this->tractorModel->mostrarTractor();
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

            if ($valorDelRol == 3) {

                echo $this->render->render("view/listaTractoresView.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }

    }

    public function registrarCalendarioTractor()
    {

        $data["login"] = $this->loginModel->ifSesionIniciada();

        if ($data["login"]) {
            $rol = $this->loginModel->getRolDeUsuario($_SESSION["nombreUsuario"]);
            $id = $_POST["id"];
            $dia = $_POST ["dia"];

            $valorDelRol = $this->loginModel->confirmarRolUsuario($rol);

            $valorAdmin = $this->loginModel->confirmarAdmin($valorDelRol);
            $valorChofer = $this->loginModel->confirmarChofer($valorDelRol);
            $valorMecanico = $this->loginModel->confirmarMecanico($valorDelRol);
            $valorSupervisor = $this->loginModel->confirmarSupervisor($valorDelRol);

            $data["valorAdmin"] = $valorAdmin;
            $data["valorChofer"] = $valorChofer;
            $data["valorMecanico"] = $valorMecanico;
            $data["valorSupervisor"] = $valorSupervisor;

            if ($valorDelRol == 3) {
                $result = $this->calendarioModel->registrarCalendarioTractor($id, $dia);

                $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id);
                $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractorEstadoCumplido($id);
                $data["calendarioSinCumplir"] = $this->calendarioModel->mostrarCalendarioPorIdTractorEstadoSinCumplir($id);

                echo $this->render->render("view/listaCalendario.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }

    }

    public function verCalendario()
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
            if ($valorDelRol == 3 || $valorDelRol == 4) {

                $id = $_GET["id"];
                $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id);
                $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractorEstadoCumplido($id);
                $data["calendarioSinCumplir"] = $this->calendarioModel->mostrarCalendarioPorIdTractorEstadoSinCumplir($id);

                echo $this->render->render("view/listaCalendario.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }

    }

    public function eliminarCalendario()
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

            if ($valorDelRol == 3) {

                $id = $_GET["id"];
                $idTractor = $_GET["idTractor"];
                $result = $this->calendarioModel->eliminarCalendario($id);
                $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($idTractor);
                $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractorEstadoCumplido($idTractor);
                $data["calendarioSinCumplir"] = $this->calendarioModel->mostrarCalendarioPorIdTractorEstadoSinCumplir($idTractor);

                echo $this->render->render("view/listaCalendario.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }

    }

    public function realizarServiceCalendario()
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
            if ($valorDelRol == 3) {
                $id = $_POST["id"];
                $id_tractor = $_GET["idTractor"];
                $fecha = $_POST["fecha"];
                $cambios = $_POST["cambios"];
                $tipo_servicio = $_POST["tipo_servicio"];
                $costo = $_POST["costo"];
                $kilometraje = $_POST["kilometraje"];
                $mecanico = $_SESSION["nombreUsuario"];

                $this->calendarioModel->editarCalendario($id, $fecha, $tipo_servicio, $cambios, $costo, $kilometraje, $mecanico);
                $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id_tractor);
                $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractorEstadoCumplido($id_tractor);
                $data["calendarioSinCumplir"] = $this->calendarioModel->mostrarCalendarioPorIdTractorEstadoSinCumplir($id_tractor);

                echo $this->render->render("view/listaCalendario.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function cambiarEstado()
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
            if ($valorDelRol == 3) {

                $id = $_GET["id"];
                $id_tractor = $_GET["id_tractor"];
                $estado = $_POST["estado"];
                $result = $this->calendarioModel->cambiarEstado($id, $estado);

                $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id_tractor);
                $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractorEstadoCumplido($id_tractor);
                $data["calendarioSinCumplir"] = $this->calendarioModel->mostrarCalendarioPorIdTractorEstadoSinCumplir($id_tractor);

                echo $this->render->render("view/listaCalendario.php", $data);

            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function editarServiceCalendario()
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
            if ($valorDelRol == 3) {
                $id = $_POST["id"];
                $id_tractor = $_GET["idTractor"];
                $fecha = $_POST["fecha"];
                $cambios = $_POST["cambios"];
                $tipo_servicio = $_POST["tipo_servicio"];
                $costo = $_POST["costo"];
                $kilometraje = $_POST["kilometraje"];
                $mecanico = $_SESSION["nombreUsuario"];

                $this->calendarioModel->editarCalendario($id, $fecha, $tipo_servicio, $cambios, $costo, $kilometraje, $mecanico);
                $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id_tractor);
                $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractorEstadoCumplido($id_tractor);
                $data["calendarioSinCumplir"] = $this->calendarioModel->mostrarCalendarioPorIdTractorEstadoSinCumplir($id_tractor);

                echo $this->render->render("view/listaCalendario.php", $data);
            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function verTractorPorId()
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
            if ($valorDelRol == 3 || $valorDelRol == 4 ) {
                $id = $_GET["id"];
                $data["tractores"] = $this->tractorModel->mostrarTractorPorId($id);

                echo $this->render->render("view/listaTractoresView.php", $data);

            } else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else {
            echo $this->render->render("view/inicio.php", $data);
        }
    }

}