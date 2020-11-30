<?php


class ImoSubClassModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function mostrarImoSubClass(){
        return $this->database->mostrarImoSubClass();
    }

    public function mostrarImoSubClassPorClase($clase){
        return $this->database->mostrarImoSubClassPorClase($clase);
    }
}