<?php


class ViajeModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function mostrarViajePorId($id){
        return $this->database->mostrarViajePorId($id);
    }
}