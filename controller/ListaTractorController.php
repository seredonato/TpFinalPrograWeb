<?php


class listaTractorController
{
    private $render;
    private $loginModel;
    private $tractorModel;
    private $calendarioModel;


    public function __construct($render,$loginModel,$tractorModel,$calendarioModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->tractorModel = $tractorModel;
        $this->calendarioModel = $calendarioModel;

    }

    public function registroTractor(){
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
            $data["tractores"] = $this->tractorModel->mostrarTractor();
            $nro_motor = $_POST["nro_motor"];
            $marca = $_POST["marca"];
            $modelo = $_POST["modelo"];
            $kilometraje = $_POST["kilometraje"];
            $patente = $_POST ["patente"];
            $nro_chasis = $_POST ["chasis"];

            $data["tractores"] = $this->tractorModel->mostrarTractor();

            $result = $this->tractorModel->registrarTractor($nro_motor,$marca,$modelo,$kilometraje,$patente,$nro_chasis);

            if ($result == "Ingrese todos los requerimientos"){
                $data["registroTractorError"] = $result;
                echo $this->render->render("view/listaTractoresView.php", $data);
            }
            if($result == "Ingrese sólo números en los campos Kilometraje y Número de motor.") {
                $data["registroTractorError"] = $result;
                echo $this->render->render("view/listaTractoresView.php", $data);
            }else {
                $data["login"] = $this->loginModel->ifSesionIniciada();
                $data["tractores"] = $this->tractorModel->mostrarTractor();
                echo $this->render->render("view/listaTractoresView.php", $data);
            }

            echo $this->render->render("view/listaTractoresView.php", $data);

        } else{
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
            $data["tractores"] = $this->tractorModel->mostrarTractor();

            echo $this->render->render("view/listaTractoresView.php", $data);

        } else{
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function modificarTractor(){
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

            $id = $_POST["id"];
            $marca = $_POST["marca"];
            $modelo = $_POST["modelo"];
            $nro_motor= $_POST["nro_motor"];
            $patente = $_POST["patente"];
            $chasis = $_POST["chasis"];
            $result = $this->tractorModel->modificarTractor($id,$marca,$modelo,$nro_motor,$patente,$chasis);

            $data["tractores"] = $this->tractorModel->mostrarTractor();
            echo $this->render->render("view/listaTractoresView.php", $data);

        } else{
            echo $this->render->render("view/inicio.php", $data);
        }
    }


    public function eliminarTractor(){

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
            echo $this->render->render("view/listaTractoresView.php", $data);

        } else{
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function registrarCalendarioTractor(){

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
            $result = $this->calendarioModel->registrarCalendarioTractor($id,$dia);

            $data["tractores"] = $this->tractorModel->mostrarTractor();
            $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id);
            $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractor($id);
            echo $this->render->render("view/listaCalendario.php", $data);
        } else{
            echo $this->render->render("view/inicio.php", $data);
        }

    }

    public function verCalendario(){
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

            $data["tractores"] = $this->tractorModel->mostrarTractor();
            $id = $_GET["id"];
            $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id);
            $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractor($id);

            echo $this->render->render("view/listaCalendario.php", $data);
        }  else{
            echo $this->render->render("view/inicio.php", $data);
        }

    }

    public function eliminarCalendario(){
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

            $id = $_GET["id"];
            $idTractor = $_GET["idTractor"];
            $result = $this->calendarioModel->eliminarCalendario($id);
            $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($idTractor);
            $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractor($idTractor);

            echo $this->render->render("view/listaCalendario.php", $data);
        }         else{
            echo $this->render->render("view/inicio.php", $data);
        }

}

    public function editarCalendario(){
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
            $id = $_POST["id"];
            $id_tractor = $_GET["idTractor"];
            $fecha = $_POST["fecha"];
            $result = $this->calendarioModel->editarCalendario($id, $fecha);
            $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id_tractor);
            $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractor($id_tractor);

            echo $this->render->render("view/listaCalendario.php", $data);
        }  else{
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

            $id = $_POST["id"];
            $id_tractor = $_POST["id_tractor"];
            $estado = $_POST["estado"];
            $result = $this->calendarioModel->cambiarEstado($id, $estado);

            $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id_tractor);
            $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractor($id_tractor);

            echo $this->render->render("view/listaCalendario.php", $data);

        }
        else{
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
            $id = $_GET["id"];
            $data["tractores"] = $this->tractorModel->devolverTractorPorIdAsignados($id);

            echo $this->render->render("view/listaTractoresView.php", $data);

        } else{
            echo $this->render->render("view/inicio.php", $data);
        }
    }

}