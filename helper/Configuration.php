<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");

include_once("controller/TransaffController.php");
include_once("controller/RegistroController.php");
include_once("controller/LoginController.php");
include_once("controller/ListaUsuarioController.php");
include_once("controller/UsuarioController.php");
include_once("controller/ListaEquipoController.php");
include_once("controller/PedidoController.php");
include_once("controller/ListaTractorController.php");
include_once("controller/ListaAcopladoController.php");
include_once("controller/ListaPedidosController.php");
include_once("controller/ProformaController.php");
include_once("controller/PdfProformaController.php");
include_once("controller/QrController.php");
include_once("controller/ReporteController.php");
include_once("controller/PdfReporteController.php");
include_once("controller/ViajeController.php");
include_once("controller/PerfilController.php");
include_once("controller/EstadisticasController.php");
include_once("controller/ActivarController.php");


include_once("model/CalendarioModel.php");
include_once("model/LoginModel.php");
include_once("model/RegistroModel.php");
include_once("model/UsuarioModel.php");
include_once("model/EquipoModel.php");
include_once("model/PedidoModel.php");
include_once("model/TractorModel.php");
include_once("model/AcopladoModel.php");
include_once("model/ImoClassModel.php");
include_once("model/ImoSubClassModel.php");
include_once("model/ProformaModel.php");
include_once("model/CargaModel.php");
include_once("model/ViajeModel.php");
include_once("model/QrModel.php");
include_once("model/ReporteModel.php");
include_once("model/CosteoFinalModel.php");
include_once("model/ActivarModel.php");

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

    public function getUsuarioModel()
    {
        $database = $this->getDatabase();
        return new UsuarioModel($database);
    }

    public function getCosteoFinalModel(){
        $database = $this->getDatabase();
        return new CosteoFinalModel($database);
    }

    public function getListaUsuarioController()
    {
        $usuarioModel = $this->getUsuarioModel();
        $loginModel = $this->getLoginModel();
        return new ListaUsuarioController($this->getRender(), $usuarioModel, $loginModel);
    }

    public function getUsuarioController()
    {
        $usuarioModel = $this->getUsuarioModel();
        $loginModel = $this->getLoginModel();
        return new UsuarioController($this->getRender(), $usuarioModel, $loginModel);
    }


    public function getEquipoModel()
    {
        $database = $this->getDatabase();
        return new EquipoModel($database);
    }


    public function getPedidoModel()
    {
        $database = $this->getDatabase();
        return new PedidoModel($database);
    }

    public function getPedidoController()
    {
        $pedidoModel = $this->getPedidoModel();
        $render = $this->getRender();
        $login = $this->getLoginModel();
        return new PedidoController($render, $pedidoModel,$login);

    }


    public function getListaPedidosController()
    {
        $loginModel = $this->getLoginModel();
        $pedidoModel = $this->getPedidoModel();
        return new ListaPedidosController($this->getRender(), $loginModel, $pedidoModel);

    }

    public function getCargaModel()
    {
        $database = $this->getDatabase();
        return new CargaModel($database);
    }

    public function getViajeModel()
    {
        $database = $this->getDatabase();
        return new ViajeModel($database);
    }

    public function getTractorModel()
    {
        $database = $this->getDatabase();
        return new TractorModel($database);
    }

    public function getCalendarioModel()
    {
        $database = $this->getDatabase();
        return new CalendarioModel($database);
    }

    public function getPerfilController(){
        $usuarioModel = $this->getUsuarioModel();
        $loginModel = $this->getLoginModel();
        return new PerfilController($this->getRender(), $usuarioModel, $loginModel);
    }

    public function getListaTractorController()
    {
        $loginModel = $this->getLoginModel();
        $tractorModel = $this->getTractorModel();
        $calendario = $this->getCalendarioModel();
        return new ListaTractorController($this->getRender(), $loginModel, $tractorModel, $calendario);
    }

    public function getAcopladoModel()
    {
        $database = $this->getDatabase();
        return new AcopladoModel($database);
    }

    public function getImoClassModel()
    {
        $database = $this->getDatabase();
        return new ImoClassModel($database);
    }

    public function getImoSubClassModel()
    {
        $database = $this->getDatabase();
        return new ImoSubClassModel($database);
    }

    public function getListaAcopladoController()
    {
        $loginModel = $this->getLoginModel();
        $acopladoModel = $this->getAcopladoModel();
        return new ListaAcopladoController($this->getRender(), $loginModel, $acopladoModel);
    }

    public function getListaEquipoController()
    {
        $loginModel = $this->getLoginModel();
        $equipoModel = $this->getEquipoModel();
        $acopladoModel = $this->getAcopladoModel();
        $tractorModel = $this->getTractorModel();

        return new ListaEquipoController($this->getRender(), $loginModel, $equipoModel, $acopladoModel, $tractorModel);
    }

    public function getProformaModel()
    {
        $database = $this->getDatabase();
        return new ProformaModel($database);
    }


    public function getProformaController()
    {
        $loginModel = $this->getLoginModel();
        $qrModel = $this->getQrModel();
        $pedidoModel = $this->getPedidoModel();
        $usuarioModel = $this->getUsuarioModel();
        $imoClassModel = $this->getImoClassModel();
        $imoSubClassModel = $this->getImoSubClassModel();
        $equipoModel = $this->getEquipoModel();
        $proformaModel = $this->getProformaModel();
        return new ProformaController($this->getRender(), $loginModel, $pedidoModel, $usuarioModel, $imoClassModel, $imoSubClassModel, $proformaModel, $equipoModel, $qrModel);

    }

    public function getPdfProformaController()
    {
        $pedidoModel = $this->getPedidoModel();
        $usuarioModel = $this->getUsuarioModel();
        $imoClassModel = $this->getImoClassModel();
        $imoSubClassModel = $this->getImoSubClassModel();
        $cargaModel = $this->getCargaModel();
        $viajeModel = $this->getViajeModel();
        $equipoModel = $this->getEquipoModel();
        $proformaModel = $this->getProformaModel();
        $loginModel = $this->getLoginModel();
        $render = $this->getRender();
        return new PdfProformaController($pedidoModel, $usuarioModel, $imoClassModel, $imoSubClassModel, $cargaModel, $viajeModel, $equipoModel, $proformaModel,$loginModel,$render);
    }

    public function getQrController()
    {
        $QrModel = $this->getQrModel();
        $loginModel = $this->getLoginModel();
        return new QrController($this->getRender(), $QrModel, $loginModel);

    }

    public function getQrModel()
    {
        $database = $this->getDatabase();
        return new QrModel($database);
    }

    public function getReporteController()
    {
        $reporteModel = $this->getReporteModel();
        $loginModel = $this->getLoginModel();
        return new ReporteController($this->getRender(), $loginModel, $reporteModel);
    }

    public function getReporteModel()
    {
        $database = $this->getDatabase();
        return new ReporteModel($database);
    }

    public function getPdfReporteController()
    {
        $reporteModel = $this->getReporteModel();
        $loginModel = $this->getLoginModel();
        $render = $this->getRender();
        return new PdfReporteController($render, $reporteModel, $loginModel);
    }

    public function getViajesController(){
        $loginModel = $this->getLoginModel();
        $viajeModel = $this->getViajeModel();
        $equipoModel = $this->getEquipoModel();
        $costeoFinalModel = $this->getCosteoFinalModel();
        return new ViajeController($this->getRender(), $costeoFinalModel, $viajeModel, $loginModel, $equipoModel);

    }

    public function getEstadisticasController(){
        $loginModel = $this->getLoginModel();
        $costeoFinalModel = $this->getCosteoFinalModel();
        return new EstadisticasController($this->getRender(), $loginModel, $costeoFinalModel);
    }


    public function getActivarModel(){
        $database = $this->getDatabase();
        return new ActivarModel($database);
    }

    public function getActivarController(){
        $activarModel = $this->getActivarModel();
        $loginModel = $this->getLoginModel();
        return new ActivarController($this->getRender(), $activarModel, $loginModel);
    }

}