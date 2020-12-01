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

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["tractores"] = $this->tractorModel->mostrarTractor();

        $result = $this->tractorModel->registrarTractor($nro_motor,$marca,$modelo,$kilometraje);

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

        $result = $this->tractorModel->modificarTractor($id,$marca,$modelo,$nro_motor);

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

}