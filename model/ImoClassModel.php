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

    public function mostrarImoClassPorClase($clase){
        return $this->database->mostrarImoClassPorClase($clase);
    }
}