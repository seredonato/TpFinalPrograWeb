<?php
class CalendarioModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarCalendarioTractor($id, $dia, $descripcion)
    {
        $sql = "INSERT INTO calendarioServicio(fecha,id_tractor,descripcion)
                VALUES ('" . $dia . "'," . $id . ",'" . $descripcion . "')";
        return $this->database->query($sql);

    }

    public function mostrarCalendarioPorIdTractor($id)
    {
        return $this->database->mostrarCalendarioPorIdTractor($id);
    }

}