<?php


class ListaEquipoController
{
    private $render;
    private $loginModel;
    private $equipoModel;
    private $acopladoModel;
    private $tractorModel;


    public function __construct($render,$loginModel,$equipoModel,$acopladoModel,$tractorModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->equipoModel = $equipoModel;
        $this->acopladoModel = $acopladoModel;
        $this->tractorModel = $tractorModel;

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
            $data["login"] = $this->loginModel->ifSesionIniciada();

            $data["equipos"] = $this->equipoModel->mostrarEquipos();
            $data["acoplados"] = $this->equipoModel->mostrarAcopladoSoloSinAsignar();
            $data["tractores"] = $this->equipoModel->mostrarTractorSoloSinAsignar();

            echo $this->render->render("view/listaEquipoView.php", $data);
        }   echo $this->render->render("view/inicio.php", $data);
    }

    public function registroEquipo()
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
            $data["login"] = $this->loginModel->ifSesionIniciada();

            $id_acoplado = $_POST["acoplado"];
            $id_tractor = $_POST["tractor"];
            $data["equipos"] = $this->equipoModel->mostrarEquipos();
            $data["acoplados"] = $this->equipoModel->mostrarAcopladoSoloSinAsignar();
            $data["tractores"] = $this->equipoModel->mostrarTractorSoloSinAsignar();


            $result = $this->equipoModel->registrarEquipo($id_acoplado, $id_tractor);
            if ($result == "Tractor y Acoplado ya existente, seleccione dentro de las opciones") {
                $data["registroEquipoError"] = $result;
                echo $this->render->render("view/listaEquipoView.php", $data);
            } else {
                if ($result == "Ingrese todos los requerimientos") {
                    $data["registroEquipoError"] = $result;
                    echo $this->render->render("view/listaEquipoView.php", $data);
                } else {
                    $data["equipos"] = $this->equipoModel->mostrarEquipos();
                    $data["acoplados"] = $this->equipoModel->mostrarAcopladoSoloSinAsignar();
                    $data["tractores"] = $this->equipoModel->mostrarTractorSoloSinAsignar();
                    echo $this->render->render("view/listaEquipoView.php", $data);
                }
            }
        } else{
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function eliminarEquipo(){
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
            $data["login"] = $this->loginModel->ifSesionIniciada();


            $id = $_GET["id"];
            $id_acoplado = $_GET["idAcoplado"];
            $id_tractor = $_GET["idTractor"];

            $this->equipoModel->eliminarEquipo($id,$id_acoplado,$id_tractor);
            $data["equipos"] = $this->equipoModel->mostrarEquipos();
            $data["acoplados"] = $this->equipoModel->mostrarAcopladoSoloSinAsignar();
            $data["tractores"] = $this->equipoModel->mostrarTractorSoloSinAsignar();

            echo $this->render->render("view/listaEquipoView.php", $data);
        }       echo $this->render->render("view/inicio.php", $data);
    }

    public function modificarEquipo(){
        $id = $_POST["id"];
        $acoplado = $_POST["acoplado"];
        $acopladoAnterior = $_GET["idAcopladoAnterior"];
        $tractorAnterior = $_GET["idTractorAnterior"];
        $tractor= $_POST["tractor"];

        $result = $this->equipoModel->modificaEquipo($id,$acoplado,$tractor,$acopladoAnterior,$tractorAnterior);

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["equipos"] = $this->equipoModel->mostrarEquipos();
        $data["acoplados"] = $this->equipoModel->mostrarAcopladoSoloSinAsignar();
        $data["tractores"] = $this->equipoModel->mostrarTractorSoloSinAsignar();

        echo $this->render->render("view/listaEquipoView.php",$data);
    }

}