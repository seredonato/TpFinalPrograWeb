<?php


class AsignarRolesController
{
    private $asignarRolesModel;
    private $render;

    public function __construct($render,$asignarRolesModel){
        $this->asignarRolesModel = $asignarRolesModel;
        $this->render = $render;
    }

    public function execute(){

        $data["usuarios"] = $this->asignarRolesModel->devolverUsuarios();
        echo $this->render->render( "view/usuarioView.php", $data );
    }

}