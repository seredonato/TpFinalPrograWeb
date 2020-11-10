<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");

include_once("controller/TransaffController.php");
include_once("controller/RegistroController");


include_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once("Router.php");

class Configuration{
    public function getPresentacionModel(){
        $database = $this->getDatabase();
        return new TourModel($database);
    }

    private function getDatabase(){
        $config = $this->getConfig();
        return new MysqlDatabase(
            $config["servername"],
            $config["username"],
            $config["password"],
            $config["dbname"]
        );
    }

    private function getConfig(){
        return parse_ini_file("config/config.ini");
    }


    public function getRender(){
        return new Render('view/partial');
    }


    public function getTransaffController(){
        return new transaffController($this->getRender());
    }

    public function getRegistroController(){
        return new RegistroController($this->getRender());
    }

    public function getRouter(){
        return new Router($this);
    }

    public function getUrlHelper(){
        return new UrlHelper();
    }
}