<?php


class ImoClassModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function mostrarImoClases(){
        return $this->database->mostrarImoClases();
    }
}