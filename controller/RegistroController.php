<?php

class RegistroController {
    private $render;
    private $registroModel;

    public function __construct($render, $registroModel){
        $this->registroModel = $registroModel;
        $this->render = $render;
    }

    public function execute(){
        echo $this->render->render("view/registroView.php");
    }

    public function registroUsuario(){

        $dni = $_POST["dni"];
        $email = $_POST["email"];
        $usuario = $_POST["usuario"];
        $contrasenia = $_POST["contrasenia"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nacimiento = $_POST["fechaNacimiento"];

        $this->registroModel->registrarUsuario($dni, $email, $usuario, $contrasenia, $nombre, $apellido, $fecha_nacimiento);

        echo $this->render->render("view/inicio.php");
    }

}