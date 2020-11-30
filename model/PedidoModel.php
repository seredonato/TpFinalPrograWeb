<?php


class PedidoModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function guardarPedido($nombreCompleto, $cuit, $email, $telefono, $direccionCliente, $contacto1, $contacto2)
    {

        $sql = 'INSERT INTO pedido_cliente (fecha_pedido, nombre_cliente, cuit_cliente ,email_cliente ,telefono_cliente ,direccion_cliente ,contacto1 ,contacto2)
                VALUES ( curdate(), "' . $nombreCompleto . '", ' . $cuit . ', "' . $email . '", ' . $telefono . ', "' . $direccionCliente . '", "' . $contacto1 . '", "' . $contacto2 . '")';

        return $this->database->query($sql);
    }

    public function mostrarPedidoPorId($id)
    {

        return $this->database->mostrarPedidoPorId($id);

    }

    public function mostrarPedidos()
    {
        return $this->database->mostrarPedidos();
    }

}