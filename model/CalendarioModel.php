<?php
class CalendarioModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarCalendarioTractor($id, $dia)
    {
        $estado = "En espera";
        $eliminado = "no";

        $sql = "INSERT INTO calendarioServicio(fecha,id_tractor,estado,eliminado)
                VALUES ('" . $dia . "'," . $id . ",'" . $estado . "','" . $eliminado . "')";
        return $this->database->query($sql);
    }

    public function mostrarCalendarioPorIdTractor($id)
    {
        return $this->database->mostrarCalendarioPorIdTractor($id);
    }

    public function cambiarEstado($id,$estado){
        return $this->database->cambiarEstado($id,$estado);
    }

    public function eliminarCalendario($id){
        return $this->database->eliminarCalendario($id);
    }

    public function editarCalendario($id,$fecha){
        return $this->database->editarCalendario($id,$fecha);
    }



}