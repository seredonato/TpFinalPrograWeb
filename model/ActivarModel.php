<?php


class ActivarModel
{

    private $database;


    public function __construct($database)

    {

        $this->database = $database;

    }

    public function activarUsuario($usuario){
        $this->database->activarUsuario($usuario);
    }

    public function verificarEstadoUsuario($usuario){
        return $this->database->verificarEstadoUsuario($usuario);
    }

}