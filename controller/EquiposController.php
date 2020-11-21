<?php


class EquiposController
{
    private $render;
    private $equiposModel;

    public function __construct($render, $equiposModel){
        $this->$equiposModel = $equiposModel;
        $this->render = $render;
    }

    public function execute(){
        echo $this->render->render("view/equiposView.php");
    }

    public function registrarEquipo(){

        $año_fabricacion = $_POST[];
        $estado = $_POST[];
        $patente = $_POST[];
        $nro_chasis = $_POST[];
        $this->registroModel->registrarUsuario($año_fabricacion, $estado, $patente, $nro_chasis);

        echo $this->render->render("view/inicio.php");
    }

    public function registrarAcoplado(){

    }

    public function eliminarEquipo(){

    }

    public function modificarEquipo(){

    }
}