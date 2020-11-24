<?php


class ListaAcopladoController
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
        $data["acoplados"] = $this->equipoModel->mostrarAcoplado();
        echo $this->render->render("view/listaAcopladosView.php", $data);
    }

    public function modificarAcoplado(){
        $tipo = $_POST["tipo"];
        $id = $_POST["id"];

        $result = $this->equipoModel->modificarAcoplado($id,$tipo);

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["acoplados"] = $this->equipoModel->mostrarAcoplado();

        echo $this->render->render("view/listaAcopladosView.php",$data);
    }

    public function eliminarAcoplado(){

        $id = $_GET["id"];

        $this->equipoModel->eliminarAcoplado($id);
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["acoplados"] = $this->equipoModel->mostrarAcoplado();

        echo $this->render->render("view/listaAcopladosView.php", $data);
    }
}