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
        $contrasenia2 = $_POST["contrasenia2"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fecha_nacimiento = $_POST["fechaNacimiento"];

        $result = $this->registroModel->registrarUsuario($dni, $email, $usuario, $contrasenia, $contrasenia2, $nombre, $apellido, $fecha_nacimiento);
        if($result == "Las contraseñas no coinciden"){

            $data["contraseñaDiferente"] = $result;

            echo $this->render->render("view/registroView.php", $data);


        }else if($result == "El usuario ya existe"){

            $data["usuarioExistente"] = $result;

            echo $this->render->render("view/registroView.php", $data);


        }else if($result == "Ya hay una cuenta asociada a este email"){

            $data["emailAsociado"] = $result;

            echo $this->render->render("view/registroView.php", $data);


        }else if ($result) {

            echo $this->render->render("view/inicio.php");


        }
    }

}