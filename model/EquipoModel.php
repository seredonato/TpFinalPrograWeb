<?php


class EquipoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarEquipo($año_fabricacion,$estadoEquipo,$patente,$nro_chasis)
    {
        $sql = "INSERT INTO equipo (año_fabricacion,estado,patente,nro_chasis)
        VALUES ('". $año_fabricacion."',". $estadoEquipo .",'".$patente."',". $nro_chasis.")";

        return $this->database->query($sql);

    }

    public function registrarTractor($nro_motor,$marca,$modelo,$calendario,$kilometraje)
    {
        $sql = "INSERT INTO tractor (marca,modelo,calendario_service,nro_motor,kilometraje)
        VALUES ('". $marca."','". $modelo."','".$calendario."',". $nro_motor.",". $kilometraje.")";

        return $this->database->query($sql);

    }

    public function registrarAcoplado($acoplado)
    {
        $sql = "INSERT INTO acoplado (tipo_acoplado)
        VALUES ('". $acoplado."')";

        return $this->database->query($sql);
    }
}