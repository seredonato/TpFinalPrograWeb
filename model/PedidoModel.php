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

        $sql = 'INSERT INTO pedido (nombre, cuit ,email ,telefono ,direccion_cliente ,direccion_1 ,direccion_2)
                VALUES ("' . $nombreCompleto . '", ' . $cuit . ', "' . $email . '", ' . $telefono . ', "' . $direccionCliente . '", "' . $contacto1 . '", "' . $contacto2 . '")';

        return $this->database->query($sql);
    }

    public function mostrarPedidos()
    {
        return $this->database->mostrarPedidos();
    }

}