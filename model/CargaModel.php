<?php


class CargaModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function mostrarCargaPorId($id){
        return $this->database->mostrarCargaPorId($id);
    }
}