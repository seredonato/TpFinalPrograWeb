<?php

class MysqlDatabase
{
    private $connection;

    public function __construct($servername, $username, $password, $dbname)
    {
        $conn = mysqli_connect(
            $servername,
            $username,
            $password,
            $dbname
        );

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $this->connection = $conn;
    }

    public function query($sql)
    {
        $this->connection->query($sql);
    }

    public function devolverUsuarios()
    {
        $sql = "SELECT * FROM usuario";
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {

            $datos[] = $fila;

        }
        return $datos;
    }

    public function devolverUnUsuarioPorNombreDeUsuario($nombreDeUsuario){

        $sql = 'SELECT rol FROM usuario WHERE usuario = "' . $nombreDeUsuario . '" ';

        $resultado = $this->connection->query($sql);
        $rol = $resultado->fetch_assoc();


        return $rol["rol"];

    }

    public function modificarRolUsuario($idUsuario, $rol){

        $sql = 'UPDATE usuario SET rol = "'. $rol .'" WHERE id = ' . $idUsuario;

        return $this->connection->query($sql);

    }

    public function eliminarUsuario($id){

        $sql = 'DELETE FROM usuario WHERE id = ' . $id;

        return $this->connection->query($sql);

    }

    public function execute($sql)
    {
        mysqli_query($this->connection, $sql);
    }


    public function devolverEquipos()
    {
        $sql = "SELECT * FROM equipo";
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function devolverTractor()
    {
        $sql = "SELECT * FROM tractor";
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function devolverAcoplado()
    {
        $sql = "SELECT * FROM acoplado";
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function eliminarEquipo($id){

        $sql = 'DELETE FROM equipo WHERE id = ' . $id;
        return $this->connection->query($sql);

    }

    public function asignarAcopladoTractor($id_acoplado,$id_tractor,$id_equipo)
    {
        $sql = "UPDATE equipo 
        SET id_tractor='$id_tractor',id_acoplado='$id_acoplado' WHERE id='$id_equipo'";
        return $this->connection->query($sql);
    }
}