<?php

class RegistroController{
    private $render;

    public function __construct($render){
        $this->render = $render;
    }

    public function execute(){
        echo $this->render->render("view/registro.php");
    }

}