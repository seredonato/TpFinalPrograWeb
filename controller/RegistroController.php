<?php

class RegistroController {
    private $render;

    public function __construct($render){
        $this->render = $render;
    }

    public function execute(){
        echo $this->render->render("view/registroView.php");
    }

    public function procesarFormulario(){
        $nombre = $_POST["nombre"];
        $dni= $_POST["dni"];
        $email["email"]  = $_POST["email"];
        $password["password"]  = $_POST["password"];
        $birthday["birthday"]  = $_POST["birthday"];

        $usuario = $this->model->crearUsuario($nombre,$dni,$email,$password,$birthday);
        $data["usuario"] = $usuario[0];

        echo $this->renderer->render( "view/registroView.php", $data);
    }

}