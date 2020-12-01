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

    public function mostrarPedidos()
    {
        $sql = 'SELECT * FROM pedido_cliente';

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarChoferes()
    {
        $sql = 'SELECT * FROM chofer';

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;

    }

    public function mostrarImoSubClass()
    {
        $sql = 'SELECT * FROM imosubclass';

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarImoSubClassPorClase($clase)
    {

        $sql = 'SELECT * FROM imosubclass WHERE clase =' . $clase;

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;

    }

    public function mostrarImoClases()
    {
        $sql = 'SELECT * FROM imoclass';

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarPedidoPorId($id)
    {

        $sql = 'SELECT * FROM pedido_cliente WHERE id = ' . $id;
        $pedido = $this->connection->query($sql);
        return $pedido->fetch_assoc();

    }

    public function viajeReturneaId($origen, $destino, $fechaCarga, $fechaLlegada)
    {

        $sql = 'SELECT id FROM viaje WHERE (origen = "' . $origen . '") AND (destino = "' . $destino . '") AND (fecha_carga = "' . $fechaCarga . '") AND (fecha_llegada = "' . $fechaLlegada . '")';

        $resultado = $this->connection->query($sql);
        $id = $resultado->fetch_assoc();

        if (isset($id["id"])) {
            return $id["id"];
        }

    }

    public function cargaReturneaId($tipo, $peso, $hazardSi)
    {

        $sql = 'SELECT id FROM carga WHERE (tipo = "' . $tipo . '") AND (peso_neto = ' . $peso . ')AND (hazard = "' . $hazardSi . '")';

        $resultado = $this->connection->query($sql);

        $id = $resultado->fetch_assoc();
        if (isset($id["id"])) {
            return $id["id"];
        }
    }

    public function costeoEstimadoReturneaId($kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes, $hazardSi)
    {

        $sql = 'SELECT id FROM costeo_estimado WHERE (kilometros = ' . $kilometros . ') AND (combustible =  ' . $combustible . ') AND (tiempo_salida = "' . $horaSalida . '") AND (tiempo_llegada = "' . $horaLlegada . '") AND (viaticos = ' . $viaticos . ') AND (peajes_pesajes = ' . $peajes . ') AND (hazard = "' . $hazardSi . '")';

        $resultado = $this->connection->query($sql);

        $id = $resultado->fetch_assoc();

        if (isset($id["id"])) {
            return $id["id"];
        }
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

    public function eliminarEquipo($id)
    {

        $sql = 'DELETE FROM equipo WHERE id = ' . $id;
        return $this->connection->query($sql);

    }

    public function devolverEquipoPorPatente($patente)
    {
        $sql = 'SELECT patente FROM equipo WHERE patente = "' . $patente . '"';
        $resultado = $this->connection->query($sql);
        $patenteObtenida = $resultado->fetch_assoc();
        if (isset($patenteObtenida["patente"])) {
            return $patenteObtenida["patente"];
        }
    }

    public function asignarAcopladoTractor($id_acoplado, $id_tractor, $id_equipo)
    {
        $sql = "UPDATE equipo 
        SET id_tractor='$id_tractor',id_acoplado='$id_acoplado' WHERE id='$id_equipo'";
        return $this->connection->query($sql);
    }

    public function modificarEquipo($id, $patente, $nro_chasis, $estadoEquipo,$fecha)
    {
        $sql = 'UPDATE equipo SET patente = "' . $patente . '", nro_chasis = ' . $nro_chasis . ', estado = "' . $estadoEquipo . '" , año_fabricacion = "' . $fecha . '"WHERE id = ' . $id;
        return $this->connection->query($sql);
    }


    public function eliminarAcoplado($id)
    {

        $sql = 'DELETE FROM acoplado WHERE id = ' . $id;
        return $this->connection->query($sql);

    }

    public function modificarAcoplado($id, $tipo)
    {
        $sql = 'UPDATE acoplado SET tipo_acoplado = "' . $tipo . '"WHERE id = ' . $id;
        return $this->connection->query($sql);
    }

    public function modificarTractor($id, $marca, $modelo, $nro_motor)
    {
        $sql = 'UPDATE tractor SET marca = "' . $marca . '", modelo = "' . $modelo . '", nro_motor = ' . $nro_motor . ' WHERE id = ' . $id;
        return $this->connection->query($sql);
    }

    public function eliminarTractor($id)
    {
        $sql = 'DELETE FROM tractor WHERE id = ' . $id;
        return $this->connection->query($sql);
    }


    public function mostrarTractorPorId($id){
        $sql = 'SELECT * FROM tractor WHERE id = "' . $id . '"';
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarCalendarioPorIdTractor($id){
        $sql = 'SELECT * FROM calendarioServicio WHERE id_tractor = "' . $id . '"';
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function cambiarEstado($id,$estado){
        $sql = 'UPDATE calendarioServicio SET estado = "' . $estado . '"WHERE id = ' . $id;
        return $this->connection->query($sql);
    }

    public function eliminarCalendario($id)
    {
        $sql = 'DELETE FROM calendarioServicio WHERE id = ' . $id;
        return $this->connection->query($sql);
    }

    public function editarCalendario($id,$descripcion,$fecha){
        $sql = 'UPDATE calendarioServicio SET descripcion = "' . $descripcion . '", fecha = "' . $fecha . '"WHERE id = ' . $id;
        return $this->connection->query($sql);
    }
}