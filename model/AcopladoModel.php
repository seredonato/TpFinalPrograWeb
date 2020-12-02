<?php


class AcopladoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarAcoplado($acoplado,$patente,$chasis)
    {
        $estado="no";
        if ($acoplado != null) {
            if ($acoplado != " "){
                $sql = "INSERT INTO acoplado (tipo_acoplado,patente,chasis,eliminado)
                VALUES ('" . $acoplado . "','" . $patente . "'," . $chasis . ",'" . $estado . "')";
                return $this->database->query($sql);
            }
            else {
                return "Ingrese contenido en el campo requerido";
            }
        } else {
            return "Ingrese contenido en el campo requerido";
        }
    }


    public function mostrarAcoplado(){
        return $this->database->devolverAcoplado();
    }

    public function modificarAcoplado($id,$tipo,$patente,$chasis){
        return $this->database->modificarAcoplado($id,$tipo,$patente,$chasis);
    }

    public function eliminarAcoplado($id){
        return $this->database->eliminarAcoplado($id);
    }



}