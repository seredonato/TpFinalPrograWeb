<?php


class ViajeModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function mostrarViajePorId($id)
    {
        return $this->database->mostrarViajePorId($id);
    }

    public function mostrarViajesAsignadosChofer($nombreUsuario)
    {
        $idChofer = $this->database->devolverIdChoferNombreUsuario($nombreUsuario);
        return $this->database->devolverViajesSegunId($idChofer);

    }

    public function mostrarViajesActivosAsignadosChofer($nombreUsuario)
    {
        $idChofer = $this->database->devolverIdChoferNombreUsuario($nombreUsuario);
        return $this->database->devolverViajesActivosSegunId($idChofer);
    }

    public function mostrarViajesFinalizadosAsignadosChofer($nombreUsuario)
    {
        $idChofer = $this->database->devolverIdChoferNombreUsuario($nombreUsuario);
        return $this->database->devolverViajesFinalizadosSegunId($idChofer);
    }


    public function mostrarViajesPendientesAsignadosChofer($nombreUsuario)
    {
        $idChofer = $this->database->devolverIdChoferNombreUsuario($nombreUsuario);
        return $this->database->devolverViajesPendientesSegunId($idChofer);
    }

}