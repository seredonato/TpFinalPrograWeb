<?php


class EquipoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getEquipo(){
        return $this->database->query("SELECT * FROM equipo");
    }

    public function getEquipoPorId($id){
        $sql = "SELECT * FROM usuario where id = " . $id;
        return $this->database->query($sql);
    }
}