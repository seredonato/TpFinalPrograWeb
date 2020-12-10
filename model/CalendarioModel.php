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

    public function mostrarCalendarioPorIdTractorEstadoCumplido($id)
    {
        return $this->database->mostrarCalendarioPorIdTractorEstadoCumplido($id);
    }

    public function mostrarCalendarioPorIdTractorEstadoSinCumplir($id)
    {
        return $this->database->mostrarCalendarioPorIdTractorEstadoSinCumplir($id);
    }

    public function cambiarEstado($id,$estado){
        return $this->database->cambiarEstado($id,$estado);
    }

    public function eliminarCalendario($id){
        return $this->database->eliminarCalendario($id);
    }

    public function editarCalendario($id,$fecha,$tipo_servicio,$cambios,$costo,$kilometraje){
        return $this->database->editarCalendario($id,$fecha,$tipo_servicio,$cambios,$costo,$kilometraje);
    }


}