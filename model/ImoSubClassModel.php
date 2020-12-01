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

    public function mostrarImoSubClassPorSubClase($clase){
        return $this->database->mostrarImoSubClassPorSubClase($clase);
    }
}