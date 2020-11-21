<?php

class TransaffController
{
    private $render;
    private $loginModel;

    public function __construct($render, $loginModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
    }

    public function execute()
    {
        $data["login"] = $this->loginModel->ifSesionIniciada();
        echo $this->render->render("view/inicio.php", $data);
    }

}