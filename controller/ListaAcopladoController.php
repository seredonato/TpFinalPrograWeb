<?php


class ListaAcopladoController
{
    private $render;
    private $loginModel;
    private $acopladoModel;


    public function __construct($render,$loginModel,$acopladoModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->acopladoModel = $acopladoModel;

    }

    public function registroAcoplado(){
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

            if($valorDelRol == 3 || $valorDelRol == 4) {
            $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();

            $acoplado = $_POST["acoplado"];
            $patente = $_POST["patente"];
            $chasis = $_POST["chasis"];

            $result = $this->acopladoModel->registrarAcoplado( $acoplado,$patente,$chasis);
            if ($result === "Ingrese contenido en el campo requerido"){
                $data["registroAcopladoError"] = $result;
                echo $this->render->render("view/listaAcopladosView.php", $data);
            }
            $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();
            echo $this->render->render("view/listaAcopladosView.php",$data);
            }else {
                echo $this->render->render("view/inicio.php", $data);
            }
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

            if($valorDelRol == 3 || $valorDelRol == 4) {
                $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();
            echo $this->render->render("view/listaAcopladosView.php", $data);

            }else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else{
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function modificarAcoplado(){
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

            if($valorDelRol == 3) {

            $tipo = $_POST["tipo"];
            $id = $_POST["id"];
            $patente = $_POST["patente"];
            $chasis = $_POST["chasis"];

            $result = $this->acopladoModel->modificarAcoplado($id,$tipo,$patente,$chasis);
            $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();
            echo $this->render->render("view/listaAcopladosView.php", $data);
            }else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else{
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function eliminarAcoplado(){
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

            if($valorDelRol == 3) {
            $id = $_GET["id"];
            $this->acopladoModel->eliminarAcoplado($id);
            $data["login"] = $this->loginModel->ifSesionIniciada();

            $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();
            echo $this->render->render("view/listaAcopladosView.php", $data);
            }else {
                echo $this->render->render("view/inicio.php", $data);
            }
        } else{
            echo $this->render->render("view/inicio.php", $data);
        }
    }

    public function verAcopladoPorId()
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

            if($valorDelRol == 3 || $valorDelRol == 4) {

            $id = $_GET["id"];
            $data["acoplados"] = $this->acopladoModel->devolverAcopladosPorIdAsignados($id);
                echo $this->render->render("view/listaAcopladosView.php", $data);
            }   else{
                echo $this->render->render("view/inicio.php", $data);
            }
        } else{
            echo $this->render->render("view/inicio.php", $data);
        }
    }
}