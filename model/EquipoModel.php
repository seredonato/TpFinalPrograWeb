<?php


class EquipoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarEquipo($año_fabricacion,$estadoEquipo,$patente,$nro_chasis,$nro_motor,$marca,$modelo,$calendario,$kilometraje,$acoplado)
    {
        $sql = "INSERT INTO equipo (año_fabricacion,estado,patente,nro_chasis,marca,modelo,calendario_service,nro_motor,kilometraje,tipo_acoplado)
        VALUES ('". $año_fabricacion."','". $estadoEquipo."',".$patente.",". $nro_chasis.",'".$marca."'.,'".$modelo."','".$calendario."',".$nro_motor.",".$kilometraje.",'".$acoplado."')";
        return $this->database->query($sql);
    }
}