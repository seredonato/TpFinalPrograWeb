<?php


class TractorModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarTractor($nro_motor,$marca,$modelo,$kilometraje,$patente,$nro_chasis)
    {
        $estado = "Sin asignar";
        $eliminado="no";
        $patenteExistente = $this->database->devolverTractorPorPatente($patente);
            if($patenteExistente != null) {
                return "Patente ya existente";
            }else{
                $sql = "INSERT INTO tractor (marca,modelo,nro_motor,patente,chasis,kilometraje,eliminado,estado)
        VALUES ('". $marca."','". $modelo."',". $nro_motor.",'". $patente."',". $nro_chasis.",". $kilometraje.",'". $eliminado."','". $estado."')";

                return $this->database->query($sql);
            }

    }

    public function mostrarTractor(){
        return $this->database->devolverTractor();
    }

    public function devolverTractorPorIdAsignados($id){
        return $this->database->devolverTractorPorIdAsignados($id);
    }

    public function modificarTractor($id,$marca,$modelo,$nro_motor,$patente,$chasis){
        return $this->database->modificarTractor($id,$marca,$modelo,$nro_motor,$patente,$chasis);
    }

    public function eliminarTractor($id){
        return $this->database->eliminarTractor($id);
    }

    public function mostrarTractorPorId($id){
        return $this->database->mostrarTractorPorId($id);
    }

}