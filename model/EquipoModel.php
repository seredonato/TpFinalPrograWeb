<?php


class EquipoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registrarEquipo($id_acoplado,$id_tractor)
    {
        $eliminado = "no";
        $estado = "Disponible";
        $verificarAcopladoAsignado = $this->database->devolverAcopladosPorIdAsignados($id_acoplado);;
        $verificarTractorAsignado = $this->database->devolverTractorPorIdAsignados($id_tractor);

        if ($id_acoplado == null || $id_tractor == null) {
            return "Ingrese todos los requerimientos";
        } else { if ($verificarAcopladoAsignado != null || $verificarTractorAsignado != null) {
            return "Tractor y Acoplado ya existente, seleccione dentro de las opciones";
            }
        }
        $sql = "INSERT INTO equipo (eliminado,id_tractor,id_acoplado,estado)
                VALUES ('" . $eliminado . "'," . $id_tractor . "," . $id_acoplado . ",'" . $estado . "')";
        $this->database->cambiarEstadoTractorYAcopladoAEnUso($id_tractor, $id_acoplado);
        return $this->database->query($sql);

    }

    public function mostrarEquipoPorId($id){
        return $this->database->mostrarEquipoPorId($id);
    }

    public function mostrarAcopladoSoloSinAsignar(){
        return $this->database->mostrarAcopladoSoloSinAsignar();
    }

    public function mostrarTractorSoloSinAsignar(){
        return $this->database->mostrarTractorSoloSinAsignar();
    }

    public function mostrarEquipos()
    {
        return $this->database->devolverEquipos();
    }

    public function eliminarEquipo($id,$id_acoplado,$id_tractor)
    {
        return $this->database->eliminarEquipo($id,$id_acoplado,$id_tractor);
    }

    public function asginarAcopladoTractor($id_acoplado, $id_tractor, $id_equipo)
    {
        return $this->database->asignarAcopladoTractor($id_acoplado, $id_tractor, $id_equipo);
    }

    public function modificaEquipo($id,$acoplado,$tractor,$acopladoAnterior,$tractorAnterior)
    {
        return $this->database->modificarEquipo($id,$acoplado,$tractor,$acopladoAnterior,$tractorAnterior);
    }

    public function cambiarEstadoNoDisponible($idEquipo){
        return $this->database->cambiarEstadoNoDisponible($idEquipo);
    }


}