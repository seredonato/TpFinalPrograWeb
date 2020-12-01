<?php


class TractorModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarTractor($nro_motor,$marca,$modelo,$kilometraje)
    {

        if ($nro_motor == null || $marca == null || $modelo == null  || $kilometraje == null){
            return "Ingrese todos los requerimientos";
        }else
            if($nro_motor == " " || $marca == " " || $modelo == " " || $kilometraje == " ") {
                return "Ingrese todos los requerimientos";
            }else{
                if(is_numeric($nro_motor) && is_numeric($kilometraje)){
                $sql = "INSERT INTO tractor (marca,modelo,nro_motor,kilometraje)
        VALUES ('". $marca."','". $modelo."',". $nro_motor.",". $kilometraje.")";

                return $this->database->query($sql);
                }else {
                    return "Ingrese sólo números en los campos Kilometraje y Número de motor.";
                }
            }

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

    public function mostrarTractorPorId($id){
        return $this->database->mostrarTractorPorId($id);
    }

}