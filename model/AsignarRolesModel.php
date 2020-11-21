<?php

class AsignarRolesModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function devolverUsuarios()
    {
        return $this->database->query("SELECT * FROM usuario");
        //$resultado = array();
        //$sql = "SELECT * FROM usuario";
       // $resultado = $this->database->query($sql);
        //$resultado[]= $this->database->query("SELECT * FROM usuario");
       // var_dump($resultado);
    }

}