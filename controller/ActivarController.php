<?php


class ActivarController
{
    private $render;
    private $activarModel;
    private $loginModel;

    public function __construct($render, $activarModel, $loginModel)
    {
        $this->render = $render;
        $this->activarModel = $activarModel;
        $this->loginModel = $loginModel;
    }

    public function execute(){
        $usuario = $_GET["usuario"];

        $this->activarModel->activarUsuario($usuario);

        $estado = $this->activarModel->verificarEstadoUsuario($usuario);

        if($estado == "ACTIVO"){
            $data["usuarioVerificado"] = true;
            echo $this->render->render("view/inicio.php", $data);
        }else{
            echo $this->render->render("view/inicio.php");
        }
    }
}