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
        $estado = "disponible";
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

    public function eliminarEquipo($id)
    {
        return $this->database->eliminarEquipo($id);
    }

    public function asginarAcopladoTractor($id_acoplado, $id_tractor, $id_equipo)
    {
        return $this->database->asignarAcopladoTractor($id_acoplado, $id_tractor, $id_equipo);
    }

    public function modificaEquipo($id, $patente, $estadoEquipo,$fecha)
    {
        return $this->database->modificarEquipo($id, $patente, $estadoEquipo,$fecha);
    }


}