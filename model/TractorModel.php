<?php


class TractorModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarTractor($nro_motor,$marca,$modelo,$calendario,$kilometraje)
    {
        $sql = "INSERT INTO tractor (marca,modelo,calendario_service,nro_motor,kilometraje)
        VALUES ('". $marca."','". $modelo."','".$calendario."',". $nro_motor.",". $kilometraje.")";

        return $this->database->query($sql);

    }

    public function mostrarTractor(){
        return $this->database->devolverTractor();
    }

    public function modificarTractor($id,$marca,$modelo,$nro_motor){
        return $this->database->modificarTractor($id,$marca,$modelo,$nro_motor);
    }

    public function eliminarTractor($id){
        return $this->database->eliminarTractor($id);
    }

}