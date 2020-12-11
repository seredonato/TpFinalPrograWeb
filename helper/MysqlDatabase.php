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
        if (isset($rol["rol"])) {
            return $rol["rol"];
        }
        return null;

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

    public function modificarLicenciaUsuario($idUsuario, $licencia){
        $sql = 'UPDATE usuario SET tipo_licencia = "' . $licencia . '" WHERE id = ' . $idUsuario;

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
        $sql = 'SELECT * FROM usuario where rol = "chofer"';

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

    public function mostrarProformaPorId($id)
    {
        $sql = 'SELECT * FROM proforma WHERE id = ' . $id;
        $pedido = $this->connection->query($sql);
        return $pedido->fetch_assoc();
    }

    public function mostrarCargaPorId($id)
    {
        $sql = 'SELECT * FROM carga WHERE id = ' . $id;
        $pedido = $this->connection->query($sql);
        return $pedido->fetch_assoc();
    }

    public function mostrarViajePorId($id)
    {
        $sql = 'SELECT * FROM viaje WHERE id = ' . $id;
        $pedido = $this->connection->query($sql);
        return $pedido->fetch_assoc();
    }

    public function mostrarImoClassPorClase($clase)
    {
        $sql = 'SELECT * FROM imoclass WHERE clase = ' . $clase;
        $pedido = $this->connection->query($sql);
        return $pedido->fetch_assoc();
    }

    public function mostrarImoSubClassPorSubClase($subClase)
    {
        $sql = 'SELECT * FROM imosubclass WHERE subclase = ' . $subClase;
        $pedido = $this->connection->query($sql);
        return $pedido->fetch_assoc();
    }

    public function mostrarChoferPorId($id)
    {
        $sql = 'SELECT * FROM usuario WHERE id = ' . $id;
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

    public function costeoEstimadoReturneaId($idViaje, $kilometros, $combustible, $horaSalida, $horaLlegada, $viaticos, $peajes, $hazardSi)
    {

        $sql = 'SELECT id FROM costeo_estimado WHERE (id_viaje = ' . $idViaje . ') AND ( kilometros = ' . $kilometros . ') AND (combustible =  ' . $combustible . ') AND (tiempo_salida = "' . $horaSalida . '") AND (tiempo_llegada = "' . $horaLlegada . '") AND (viaticos = ' . $viaticos . ') AND (peajes_pesajes = ' . $peajes . ') AND (hazard = ' . $hazardSi . ')';
        $resultado = $this->connection->query($sql);

        $id = $resultado->fetch_assoc();

        if (isset($id["id"])) {
            return $id["id"];
        }
    }

    public function mostrarCostoTemperatura()
    {
        $sql = 'SELECT temperatura FROM precio';
        $resultado = $this->connection->query($sql);

        $temperatura = $resultado->fetch_assoc();

        return $temperatura["temperatura"];
    }

    public function mostrarIdProforma($idPedido, $idViaje, $idCarga, $idCosteoEstimado, $idChofer, $idEquipo)
    {
        $sql = 'SELECT id FROM proforma WHERE (id_pedido_cliente = ' . $idPedido . ') AND (id_viaje =  ' . $idViaje . ') AND (id_carga = ' . $idCarga . ') AND (id_costeo_estimado = "' . $idCosteoEstimado . '") AND (id_usuario = ' . $idChofer . ') AND (id_equipo = ' . $idEquipo . ')';

        $resultado = $this->connection->query($sql);

        $id = $resultado->fetch_assoc();

        if (isset($id["id"])) {
            return $id["id"];
        }
    }

    public function devolverEquipos()
    {
        $estado = "no";


        $sql = 'select e.id,e.id_tractor,e.id_acoplado,e.estado,t.marca,
        t.modelo,t.patente as t_patente,t.nro_motor,t.chasis as t_chasis,t.kilometraje,
        a.tipo_acoplado,a.patente as a_patente,a.chasis as a_chasis
        from equipo as e inner join acoplado as a
        on e.id_acoplado = a.id 
        inner join tractor as t on e.id_tractor = t.id
        WHERE e.eliminado = "' . $estado . '"';

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarEquipoPorId($id)
    {
        $sql = 'select e.id,e.id_tractor,e.id_acoplado,e.estado,t.marca,
        t.modelo,t.patente as t_patente,t.nro_motor,t.chasis as t_chasis,t.kilometraje,
        a.tipo_acoplado,a.patente as a_patente,a.chasis as a_chasis
        from equipo as e inner join acoplado as a
        on e.id_acoplado = a.id 
        inner join tractor as t on e.id_tractor = t.id
        WHERE e.id = ' . $id;

        $resultado = $this->connection->query($sql);

        $fila = $resultado->fetch_assoc();

        if (isset($fila)) {
            return $fila;
        }
    }

    public function cambiarEstadoNoDisponible($idEquipo){
        $estado = "No disponible";
        $sql = 'UPDATE equipo SET estado = "' . $estado . '" WHERE id = ' . $idEquipo;
        return $this->connection->query($sql);
    }

    public function cambiarEstadoADisponible($idEquipo){
        $estado = "Disponible";
        $sql = 'UPDATE equipo SET estado = "' . $estado . '" WHERE id = ' . $idEquipo;
        return $this->connection->query($sql);
    }


    public function devolverTractor()
    {
        $estado = "no";
        $sql = "SELECT * FROM tractor WHERE eliminado ='" . $estado . "'";
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function devolverAcoplado()
    {
        $estado = "no";
        $sql = "SELECT * FROM acoplado WHERE eliminado ='" . $estado . "'";
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function eliminarEquipo($id, $id_acoplado, $id_tractor)
    {

        $estado = "Sin asignar";
        $eliminado = "si";
        $sql1 = 'UPDATE acoplado SET estado = "' . $estado . '" WHERE id = ' . $id_acoplado;
        $sql2 = 'UPDATE tractor SET estado = "' . $estado . '" WHERE id = ' . $id_tractor;

        $sql = 'UPDATE equipo SET eliminado = "' . $eliminado . '" WHERE id = ' . $id;
        $this->connection->query($sql1);
        $this->connection->query($sql2);
        return $this->connection->query($sql);
    }


    public function modificarEquipo($id, $acoplado, $tractor, $acopladoAnterior, $tractorAnterior)
    {
        $estado1 = "Sin asignar";
        $estado2 = "Asignado";
        $sql = 'UPDATE equipo SET id_tractor = ' . $tractor . ', id_acoplado = ' . $acoplado . ' WHERE id = ' . $id;
        $sql1 = 'UPDATE acoplado SET estado = "' . $estado1 . '" WHERE id = ' . $acopladoAnterior;
        $sql2 = 'UPDATE tractor SET estado = "' . $estado1 . '" WHERE id = ' . $tractorAnterior;
        $sql3 = 'UPDATE acoplado SET estado = "' . $estado2 . '" WHERE id = ' . $acoplado;
        $sql4 = 'UPDATE tractor SET estado = "' . $estado2 . '" WHERE id = ' . $tractor;
        $this->connection->query($sql1);
        $this->connection->query($sql2);
        $this->connection->query($sql3);
        $this->connection->query($sql4);
        return $this->connection->query($sql);
    }


    public function cambiarEstadoTractorYAcopladoAEnUso($id_tractor, $id_acoplado)
    {
        $sql = "UPDATE tractor 
        SET estado='Asignado' WHERE id='$id_tractor'";
        $sql2 = "UPDATE acoplado 
        SET estado='Asignado' WHERE id='$id_acoplado'";
        $this->connection->query($sql);
        return $this->connection->query($sql2);

    }


    public function eliminarAcoplado($id)
    {
        $estado = "si";
        $sql = 'UPDATE acoplado SET eliminado = "' . $estado . '" WHERE id = ' . $id;
        return $this->connection->query($sql);
    }

    public function modificarAcoplado($id, $tipo, $patente, $chasis)
    {
        $sql = 'UPDATE acoplado SET tipo_acoplado = "' . $tipo . '",patente = "' . $patente . '",chasis = "' . $chasis . '" WHERE id = ' . $id;
        return $this->connection->query($sql);
    }

    public function modificarTractor($id, $marca, $modelo, $nro_motor, $patente, $chasis)
    {
        $sql = 'UPDATE tractor SET marca = "' . $marca . '", modelo = "' . $modelo . '", nro_motor = ' . $nro_motor . ', patente  = "' . $patente . '",chasis = "' . $chasis . '" WHERE id = ' . $id;
        return $this->connection->query($sql);
    }

    public function eliminarTractor($id)
    {
        $eliminado = "si";
        $sql = 'UPDATE tractor SET eliminado = "' . $eliminado . '" WHERE id = ' . $id;

        return $this->connection->query($sql);
    }


    public function mostrarTractorPorId($id)
    {
        $eliminado = "no";
        $sql = 'SELECT * FROM tractor WHERE id = "' . $id . '" AND eliminado = "' . $eliminado . '"';
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function devolverTractorPorIdAsignados($id)
    {
        $eliminado = "no";
        $sql = 'SELECT * FROM tractor WHERE id = "' . $id . '" AND eliminado = "' . $eliminado . '" AND estado = "Asignado"';
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function devolverAcopladosPorIdAsignados($id)
    {
        $eliminado = "no";
        $sql = 'SELECT * FROM acoplado WHERE id = "' . $id . '" AND eliminado = "' . $eliminado . '" AND estado = "Asignado"';
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarAcopladoSoloSinAsignar()
    {
        $eliminado = "no";
        $estado = "Sin asignar";

        $sql = "SELECT * FROM acoplado WHERE eliminado = '" . $eliminado . "' AND estado = '" . $estado . "' ";

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarTractorSoloSinAsignar()
    {
        $eliminado = "no";
        $estado = "Sin asignar";

        $sql = "SELECT * FROM tractor WHERE eliminado = '" . $eliminado . "' AND estado = '" . $estado . "' ";


        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarCalendarioPorIdTractorEstadoCumplido($id)
    {
        $eliminado= "no";
        $estado = "Cumplido";
        $sql = 'SELECT * FROM calendarioServicio WHERE id_tractor = "' . $id . '" AND eliminado = "' . $eliminado . '" AND estado = "'.$estado.'" ';
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarCalendarioPorIdTractorEstadoSinCumplir($id)
    {
        $eliminado= "no";
        $estado = "Cumplido";
        $sql = 'SELECT * FROM calendarioServicio WHERE id_tractor = "' . $id . '" AND eliminado = "' . $eliminado . '" AND estado != "'.$estado.'" ';
        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function cambiarEstado($id, $estado)
    {
        $sql = 'UPDATE calendarioServicio SET estado = "' . $estado . '"WHERE id = ' . $id;
        return $this->connection->query($sql);
    }

    public function eliminarCalendario($id)
    {
        $estado = "si";
        $sql = 'UPDATE calendarioServicio SET eliminado = "' . $estado . '" WHERE id = ' . $id;
        return $this->connection->query($sql);
    }

    public function editarCalendario($id, $fecha,$tipo_servicio,$cambios,$costo,$kilometraje,$mecanico)
    {
        $estado= "Cumplido";
        $sql = 'UPDATE calendarioServicio SET fecha = "' . $fecha . '", tipo_service = "'.$tipo_servicio.'",
        respuestosCambiados = "'.$cambios.'", costo = '.$costo.' , estado = "'.$estado.'", kilometraje= '.$kilometraje.', mecanico = "'.$mecanico.'" WHERE id = ' . $id;
        return $this->connection->query($sql);
    }

    public function devolverCostoHazard($imoClass)
    {
        $sql = 'SELECT precio FROM imoClass where clase =' . $imoClass;
        $resultado = $this->connection->query($sql);
        $precio = $resultado->fetch_assoc();
        if (isset($precio["precio"])) {

            return $precio["precio"];
        }
    }

    public function reporteDelDia($idViaje)
    {
        $sql = 'SELECT COUNT(reporte.id_viaje) AS cant_reportes FROM reporte WHERE fecha = curdate() AND id_viaje =' . $idViaje;

        $resultado = $this->connection->query($sql);

        $cantReportes = $resultado->fetch_assoc();

        return $cantReportes;
    }

    public function obtenerPrecioDePeaje()
    {
        $sql = 'SELECT peaje FROM precio';

        $resultado = $this->connection->query($sql);

        $peaje = $resultado->fetch_assoc();

        return $peaje["peaje"];
    }

    public function obtenerPrecioPorKm()
    {
        $sql = 'SELECT kilometro FROM precio';

        $resultado = $this->connection->query($sql);

        $km = $resultado->fetch_assoc();

        return $km["kilometro"];
    }

    public function obtenerPrecioPorLitro()
    {
        $sql = 'SELECT litro FROM precio';

        $resultado = $this->connection->query($sql);

        $litro = $resultado->fetch_assoc();

        return $litro["litro"];
    }

    public function obtenerPrecioHazard($idViaje)
    {
        $sql = 'SELECT hazard FROM costeo_estimado WHERE id_viaje =' . $idViaje;

        $resultado = $this->connection->query($sql);

        $hazard = $resultado->fetch_assoc();

        return $hazard["hazard"];
    }

    public function obtenerPrecioReefer($idViaje)
    {
        $sql = 'SELECT reefer FROM costeo_estimado WHERE id_viaje =' . $idViaje;

        $resultado = $this->connection->query($sql);

        $reefer = $resultado->fetch_assoc();

        return $reefer["reefer"];
    }

    public function obtenerReportesDelViajePorIdProforma($idProforma)
    {
        $sql = 'SELECT * FROM reporte AS r  WHERE r.id_viaje =' . $idProforma;

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function obtenerReportesDelViajePorIdViaje($idViaje)
    {
        $sql = 'SELECT * FROM reporte AS r  WHERE r.id_viaje =' . $idViaje;

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarDatosChoferPorIdProforma($idProforma)
    {
        $sql = 'SELECT u.nombre,u.apellido,u.email,u.id,u.dni,u.tipo_licencia FROM usuario AS u JOIN proforma AS p ON u.id = p.id_usuario WHERE p.id =' . $idProforma;

        $resultado = $this->connection->query($sql);

        $chofer = $resultado->fetch_assoc();

        return $chofer;

    }

    public function mostrarPedidosSinProforma()
    {
        $sql = 'SELECT  p.id,p.fecha_pedido,p.nombre_cliente,p.cuit_cliente,p.direccion_cliente,p.telefono_cliente,p.email_cliente,p.contacto1, p.contacto2 FROM pedido_cliente AS p WHERE p.id NOT IN (SELECT id FROM proforma)';

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarPedidosFinalizados()
    {
        $sql = 'SELECT p.id,p.fecha_pedido,p.nombre_cliente,p.cuit_cliente,p.direccion_cliente,p.telefono_cliente,p.email_cliente,p.contacto1, p.contacto2 FROM pedido_cliente AS p JOIN proforma AS pr ON p.id = pr.id JOIN viaje AS v ON pr.id = v.id WHERE v.estado = "FINALIZADO"';

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarPedidosActivos()
    {
        $sql = 'SELECT p.id,p.fecha_pedido,p.nombre_cliente,p.cuit_cliente,p.direccion_cliente,p.telefono_cliente,p.email_cliente,p.contacto1, p.contacto2 FROM pedido_cliente AS p JOIN proforma AS pr ON p.id = pr.id JOIN viaje AS v ON pr.id = v.id WHERE v.estado = "ACTIVO"';

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarPedidosPendientes()
    {
        $sql = 'SELECT p.id,p.fecha_pedido,p.nombre_cliente,p.cuit_cliente,p.direccion_cliente,p.telefono_cliente,p.email_cliente,p.contacto1, p.contacto2 FROM pedido_cliente AS p JOIN proforma AS pr ON p.id = pr.id JOIN viaje AS v ON pr.id = v.id WHERE v.estado = "PENDIENTE"';

        $resultado = $this->connection->query($sql);
        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function mostrarCosteoEstimadoPorIdDeProforma($id)
    {
        $sql = 'SELECT * FROM costeo_estimado WHERE id = ' . $id;

        $resultado = $this->connection->query($sql);

        $costeoEstimado = $resultado->fetch_assoc();

        return $costeoEstimado;
    }

    public function obtenerTablaConPrecios()
    {
        $sql = 'SELECT * FROM precio';

        $resultado = $this->connection->query($sql);

        $precios = $resultado->fetch_assoc();

        return $precios;
    }

    public function devolverIdChoferNombreUsuario($nombreUsuario)
    {
        $sql = 'SELECT id FROM usuario WHERE usuario ="' . $nombreUsuario . '"';

        $resultado = $this->connection->query($sql);

        $id = $resultado->fetch_assoc();

        return $id["id"];
    }

    public function devolverViajesSegunId($id)
    {
        $sql = 'SELECT v.id, v.origen, v.destino, v.estado, v.fecha_carga, v.tiempo_carga, v.fecha_llegada, v.tiempo_llegada 
FROM viaje AS v JOIN proforma AS p ON p.id_viaje = v.id JOIN usuario AS u ON p.id_usuario = u.id WHERE p.id_usuario=' . $id;

        $resultado = $this->connection->query($sql);

        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function devolverViajesActivosSegunId($id)
    {
        $sql = 'SELECT v.id, v.origen, v.destino, v.estado, v.fecha_carga, v.tiempo_carga, v.fecha_llegada, v.tiempo_llegada, e.id as id_equipo 
FROM viaje AS v JOIN proforma AS p ON p.id_viaje = v.id JOIN usuario AS u ON p.id_usuario = u.id JOIN equipo as e on e.id = p.id_equipo  WHERE p.id_usuario="' . $id . '" AND v.estado = "ACTIVO"';

        $resultado = $this->connection->query($sql);

        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function devolverViajesFinalizadosSegunId($id)
    {
        $sql = 'SELECT v.id, v.origen, v.destino, v.estado, v.fecha_carga, v.tiempo_carga, v.fecha_llegada, v.tiempo_llegada 
FROM viaje AS v JOIN proforma AS p ON p.id_viaje = v.id JOIN usuario AS u ON p.id_usuario = u.id WHERE p.id_usuario="' . $id . '" AND v.estado = "FINALIZADO"';

        $resultado = $this->connection->query($sql);

        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function devolverViajesPendientesSegunId($id)
    {
        $sql = 'SELECT v.id, v.origen, v.destino, v.estado, v.fecha_carga, v.tiempo_carga, v.fecha_llegada, v.tiempo_llegada, e.id as id_equipo
FROM viaje AS v JOIN proforma AS p ON p.id_viaje = v.id JOIN usuario AS u ON p.id_usuario = u.id JOIN equipo as e on e.id = p.id_equipo  WHERE p.id_usuario="' . $id . '" AND v.estado = "PENDIENTE"';

        $resultado = $this->connection->query($sql);

        $datos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }

    public function asignarHoraSalidayEstado($idViaje)
    {
        $sql = 'UPDATE costeo_final SET tiempo_salida = now() WHERE id_viaje =' . $idViaje;
        $sql1 = 'UPDATE viaje SET estado = "ACTIVO" WHERE id =' . $idViaje;

        $this->connection->query($sql);
        $this->connection->query($sql1);
    }

    public function asignarHoraLlegadayEstado($idViaje)
    {
        $sql = 'UPDATE costeo_final SET tiempo_llegada = now() WHERE id_viaje =' . $idViaje;
        $sql1 = 'UPDATE viaje SET estado = "FINALIZADO" WHERE id =' . $idViaje;

        $this->connection->query($sql);
        $this->connection->query($sql1);
    }
}