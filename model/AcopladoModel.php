<?php


class AcopladoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarAcoplado($acoplado)
    {
        $estado="no";
        if ($acoplado != null) {
            if ($acoplado != " "){
                $sql = "INSERT INTO acoplado (tipo_acoplado,eliminado)
                VALUES ('" . $acoplado . "','" . $estado . "')";
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

    public function modificarAcoplado($id,$tipo){
        return $this->database->modificarAcoplado($id,$tipo);
    }

    public function eliminarAcoplado($id){
        return $this->database->eliminarAcoplado($id);
    }



}