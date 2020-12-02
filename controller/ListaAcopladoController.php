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
        $acoplado = $_POST["acoplado"];
        $patente = $_POST["patente"];
        $chasis = $_POST["chasis"];
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();

        $result = $this->acopladoModel->registrarAcoplado( $acoplado,$patente,$chasis);
        if ($result === "Ingrese contenido en el campo requerido"){
            $data["registroAcopladoError"] = $result;
            echo $this->render->render("view/listaAcopladosView.php", $data);
        }
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();
        echo $this->render->render("view/listaAcopladosView.php",$data);

    }


    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();
        echo $this->render->render("view/listaAcopladosView.php", $data);
    }

    public function modificarAcoplado(){
        $tipo = $_POST["tipo"];
        $id = $_POST["id"];
        $patente = $_POST["patente"];
        $chasis = $_POST["chasis"];

        $result = $this->acopladoModel->modificarAcoplado($id,$tipo,$patente,$chasis);

        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();

        echo $this->render->render("view/listaAcopladosView.php",$data);
    }

    public function eliminarAcoplado(){

        $id = $_GET["id"];

        $this->acopladoModel->eliminarAcoplado($id);
        $data["login"] = $this->loginModel->ifSesionIniciada();
        $data["acoplados"] = $this->acopladoModel->mostrarAcoplado();

        echo $this->render->render("view/listaAcopladosView.php", $data);
    }
}