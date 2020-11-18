<?php


class ModeluInitializer
{

    private $renderer;
    private $config;
    private $database;

    public function __construct()
    {
        $this->renderer = new Renderer('view/partial');
        $this->config = new Config("config/config.ini");
        $this->database = Database::createDatabaseFromConfig($this->config);
    }


    public function createUsuarioController()
    {
        include_once("model/CrearUsuarioModel.php");
        include_once("controller/RegistroController.php");

        $model = new CrearUsuarioModel($this->database);
        return new RegistroController($model, $this->renderer);
    }


}