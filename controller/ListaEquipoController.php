<?php


class ListaEquipoController
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
            echo $this->render->render("view/listaEquipoView.php", $data);
    }

    public function registroEquipo(){
        $año_fabricacion = $_POST["año_fabricacion"];
        $estadoEquipo = $_POST["estadoEquipo"];
        $patente = $_POST["patente"];
        $nro_chasis = $_POST["nro_chasis"];

        $result = $this->equipoModel->registrarEquipo($año_fabricacion,$estadoEquipo,$patente,$nro_chasis);
        echo $this->render->render("view/listaEquipoView.php");
    }

    public function registroTractor(){
        $nro_motor = $_POST["nro_motor"];
        $marca = $_POST["marca"];
        $modelo = $_POST["modelo"];
        $calendario = $_POST["calendario"];
        $kilometraje = $_POST["kilometraje"];

        $result = $this->equipoModel->registrarTractor($nro_motor,$marca,$modelo,$calendario,$kilometraje);
        echo $this->render->render("view/listaEquipoView.php");
    }

    public function registroAcoplado(){
        $acoplado = $_POST["acoplado"];

        $result = $this->equipoModel->registrarAcoplado( $acoplado);
        echo $this->render->render("view/listaEquipoView.php");

    }
}