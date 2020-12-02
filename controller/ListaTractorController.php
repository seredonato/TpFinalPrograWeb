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
        $nro_motor = $_POST["nro_motor"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $kilometraje = $_POST["kilometraje"];
        $patente = $_POST ["patente"];
        $nro_chasis = $_POST ["chasis"];

        $data["login"] = $this->loginModel->ifSesionIniciada();
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
    }

    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["tractores"] = $this->tractorModel->mostrarTractor();
        echo $this->render->render("view/listaTractoresView.php", $data);
    }

    public function modificarTractor(){
        $id = $_POST["id"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $nro_motor= $_POST["nro_motor"];
        $patente = $_POST["patente"];
        $chasis = $_POST["chasis"];

        $result = $this->tractorModel->modificarTractor($id,$marca,$modelo,$nro_motor,$patente,$chasis);

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["tractores"] = $this->tractorModel->mostrarTractor();

        echo $this->render->render("view/listaTractoresView.php",$data);
    }


    public function eliminarTractor(){

        $id = $_GET["id"];
        $this->tractorModel->eliminarTractor($id);
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["tractores"] = $this->tractorModel->mostrarTractor();

        echo $this->render->render("view/listaTractoresView.php", $data);
    }

    public function registrarCalendarioTractor(){

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["tractores"] = $this->tractorModel->mostrarTractor();

        $id = $_POST["id"];
        $dia = $_POST ["dia"];
        $descripcion = $_POST["descripcion"];
        $result = $this->calendarioModel->registrarCalendarioTractor($id,$dia,$descripcion);

        $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id);
        $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractor($id);

        echo $this->render->render("view/listaCalendario.php", $data);

    }

    public function verCalendario(){
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["tractores"] = $this->tractorModel->mostrarTractor();

        $id = $_GET["id"];
        $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id);
        $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractor($id);

        echo $this->render->render("view/listaCalendario.php", $data);
    }

    public function eliminarCalendario(){
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $id = $_GET["id"];
        $idTractor = $_GET["idTractor"];
        $result = $this->calendarioModel->eliminarCalendario($id);
        $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($idTractor);
        $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractor($idTractor);

        echo $this->render->render("view/listaCalendario.php", $data);
    }

    public function editarCalendario(){
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $id = $_POST["id"];
        $id_tractor = $_GET["idTractor"];
        $descripcion = $_POST["descripcion"];
        $fecha = $_POST["fecha"];
        $result = $this->calendarioModel->editarCalendario($id,$descripcion,$fecha);
        $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id_tractor);
        $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractor($id_tractor);

        echo $this->render->render("view/listaCalendario.php", $data);
    }

    public function cambiarEstado(){

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["tractores"] = $this->tractorModel->mostrarTractor();

        $id = $_POST["id"];
        $id_tractor = $_POST["id_tractor"];
        $estado = $_POST["estado"];
        $result = $this->calendarioModel->cambiarEstado($id,$estado);

        $data["tractorPorId"] = $this->tractorModel->mostrarTractorPorId($id_tractor);
        $data["calendario"] = $this->calendarioModel->mostrarCalendarioPorIdTractor($id_tractor);

        echo $this->render->render("view/listaCalendario.php", $data);
    }

}