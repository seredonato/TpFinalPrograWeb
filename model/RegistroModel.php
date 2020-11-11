<?php

class RegistroModel{
    private $database;

    public function __construct($database){
        $this->database = $database;
    }

    public function registrarUsuario($usuario, $contraseña){
        $contraseñaEncriptada = mb5($contraseña);
        $sql =
        return $this->database->query("SELECT * FROM presentaciones");
    }
}