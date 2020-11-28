<?php


class listaTractorController
{
    private $render;
    private $loginModel;
    private $tractorModel;


    public function __construct($render,$loginModel,$tractorModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
        $this->tractorModel = $tractorModel;

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
        $calendario= $_POST["calendario"];
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

}