<?php


class ChoferModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function mostrarChoferes(){
        return $this->database->mostrarChoferes();
    }

}