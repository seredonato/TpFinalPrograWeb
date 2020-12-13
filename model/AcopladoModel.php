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
        $estado = "Sin asignar";
        $eliminado="no";
        if ($acoplado != null) {
            if ($acoplado != " "){
                $sql = "INSERT INTO acoplado (tipo_acoplado,patente,chasis,eliminado,estado)
                VALUES ('" . $acoplado . "','" . $patente . "'," . $chasis . ",'" . $eliminado . "','" . $estado . "')";
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

    public function devolverAcopladosPorIdAsignados($id){
        return $this->database->devolverAcopladosPorIdAsignados($id);
    }

    public function modificarAcoplado($id,$tipo,$patente,$chasis){
        return $this->database->modificarAcoplado($id,$tipo,$patente,$chasis);
    }

    public function eliminarAcoplado($id){
        return $this->database->eliminarAcoplado($id);
    }



}