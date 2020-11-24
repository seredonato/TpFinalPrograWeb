<?php


class listaTractorController
{
    private $render;
    private $loginModel;
    private $equipoModel;


    public function __construct($render,$loginModel,$equipoModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->equipoModel = $equipoModel;

    }

    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["tractores"] = $this->equipoModel->mostrarTractor();
        echo $this->render->render("view/listaTractoresView.php", $data);
    }

    public function modificarTractor(){
        $id = $_POST["id"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $calendario= $_POST["calendario"];
        $nro_motor= $_POST["nro_motor"];


        $result = $this->equipoModel->modificarTractor($id,$marca,$modelo,$nro_motor);

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["tractores"] = $this->equipoModel->mostrarTractor();

        echo $this->render->render("view/listaTractoresView.php",$data);
    }


    public function eliminarTractor(){

        $id = $_GET["id"];

        $this->equipoModel->eliminarTractor($id);
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["tractores"] = $this->equipoModel->mostrarTractor();

        echo $this->render->render("view/listaTractoresView.php", $data);
    }

}