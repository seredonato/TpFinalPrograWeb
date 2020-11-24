<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");

include_once("controller/TransaffController.php");
include_once("controller/RegistroController.php");
include_once("controller/LoginController.php");
include_once ("controller/ListaUsuarioController.php");
include_once ("controller/UsuarioController.php");
include_once ("controller/ListaEquipoController.php");
include_once ("controller/PedidoController.php");
include_once ("controller/ListaTractorController.php");
include_once ("controller/ListaAcopladoController.php");
include_once ("controller/ListaPedidosController.php");
include_once ("controller/ProformaController.php");


include_once("model/LoginModel.php");
include_once("model/RegistroModel.php");
include_once("model/UsuarioModel.php");
include_once("model/EquipoModel.php");
include_once("model/PedidoModel.php");
include_once("model/ChoferModel.php");






include_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once("Router.php");

class Configuration
{

    private function getDatabase()
    {
        $config = $this->getConfig();
        return new MysqlDatabase(
            $config["servername"],
            $config["username"],
            $config["password"],
            $config["dbname"]
        );
    }

    private function getConfig()
    {
        return parse_ini_file("config/config.ini");
    }


    public function getRender()
    {
        return new Render('view/partial');
    }

    public function getRouter()
    {
        return new Router($this);
    }

    public function getUrlHelper()
    {
        return new UrlHelper();
    }

    public function getRegistroModel()
    {
        $database = $this->getDatabase();
        return new RegistroModel($database);
    }

    public function getLoginController()
    {
        $loginModel = $this->getLoginModel();
        return new LoginController($this->getRender(), $loginModel);
    }

    public function getLoginModel()
    {
        $database = $this->getDatabase();
        return new LoginModel($database);
    }

    public function getTransaffController()
    {
        $loginModel = $this->getLoginModel();
        return new TransaffController($this->getRender(), $loginModel);
    }

    public function getRegistroController()
    {
        $registroModel = $this->getRegistroModel();
        return new RegistroController($this->getRender(), $registroModel);
    }

    public function getUsuarioModel(){
        $database = $this->getDatabase();
        return new UsuarioModel($database);
    }

    public function getListaUsuarioController(){
        $usuarioModel = $this->getUsuarioModel();
        $loginModel = $this->getLoginModel();
        return new ListaUsuarioController($this->getRender(), $usuarioModel, $loginModel);
    }

    public function getUsuarioController(){
        $usuarioModel = $this->getUsuarioModel();
        $loginModel = $this->getLoginModel();
        return new UsuarioController($this->getRender(), $usuarioModel, $loginModel);
    }


    public function getEquipoModel(){
        $database = $this->getDatabase();
        return new EquipoModel($database);
    }

    public function getListaEquipoController(){
        $loginModel = $this->getLoginModel();
        $equipoModel = $this->getEquipoModel();
        return new ListaEquipoController($this->getRender(),$loginModel,$equipoModel);
    }


    public function getPedidoModel(){
        $database = $this->getDatabase();
        return new PedidoModel($database);
    }

    public function getPedidoController(){
        $pedidoModel = $this->getPedidoModel();
        return new PedidoController($this->getRender(), $pedidoModel);

    }

    public function getListaTractorController(){
        $loginModel = $this->getLoginModel();
        $equipoModel = $this->getEquipoModel();
        return new ListaTractorController($this->getRender(),$loginModel,$equipoModel);
    }

    public function getListaPedidosController(){
        $loginModel = $this->getLoginModel();
        $pedidoModel = $this->getPedidoModel();
        return new ListaPedidosController($this->getRender(),$loginModel,$pedidoModel);

    }

    public function getChoferModel(){
        $database = $this->getDatabase();
        return new ChoferModel($database);
    }

    public function getListaAcopladoController(){
        $loginModel = $this->getLoginModel();
        $equipoModel = $this->getEquipoModel();
        return new ListaAcopladoController($this->getRender(),$loginModel,$equipoModel);
    }

    public function getProformaController(){
        $loginModel = $this->getLoginModel();
        $pedidoModel = $this->getPedidoModel();
        $choferModel = $this->getChoferModel();
        return new ProformaController($this->getRender(),$loginModel,$pedidoModel, $choferModel);

    }



}