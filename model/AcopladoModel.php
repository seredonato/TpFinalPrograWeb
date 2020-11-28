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
        $sql = "INSERT INTO acoplado (tipo_acoplado)
        VALUES ('". $acoplado."')";

        return $this->database->query($sql);
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