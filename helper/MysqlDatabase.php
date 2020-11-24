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

    public function devolverUnUsuarioPorNombreDeUsuario($nombreDeUsuario)
    {

        $sql = 'SELECT rol FROM usuario WHERE usuario = "' . $nombreDeUsuario . '" ';

        $resultado = $this->connection->query($sql);
        $rol = $resultado->fetch_assoc();


        return $rol["rol"];

    }

    public function devolverUsuarioPorUsuario($usuario)
    {

        $sql = 'SELECT usuario FROM usuario WHERE usuario = "' . $usuario . '"';
        $resultado = $this->connection->query($sql);
        $usuarioObtenido = $resultado->fetch_assoc();

        if (isset($usuarioObtenido["usuario"])) {
            return $usuarioObtenido["usuario"];
        }
    }

    public function devolverEmailPorEmail($email)
    {
        $sql = 'SELECT email FROM usuario WHERE email = "' . $email . '"';
        $resultado = $this->connection->query($sql);
        $emailObtenido = $resultado->fetch_assoc();
        if (isset($emailObtenido["email"])) {
            return $emailObtenido["email"];
        }
    }

    public function modificarRolUsuario($idUsuario, $rol)
    {

        $sql = 'UPDATE usuario SET rol = "' . $rol . '" WHERE id = ' . $idUsuario;

        return $this->connection->query($sql);

    }

    public function eliminarUsuario($id)
    {

        $sql = 'DELETE FROM usuario WHERE id = ' . $id;

        return $this->connection->query($sql);

    }

    public function execute($sql)
    {
        mysqli_query($this->connection, $sql);
    }
}