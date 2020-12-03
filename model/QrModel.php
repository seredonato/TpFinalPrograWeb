<?php

require("vendor/autoload.php");
include_once("phpqrcode/qrlib.php");

class QrModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function decodificarQrDesdeArchivo($archivo){
        $qrcode= new \Zxing\QrReader($archivo);
        $text= $qrcode->text();

        return $text;
    }

    public function generarQr($idViaje)
    {
        $direccion = 'public/imgQr/';
        $nombre = $idViaje . '.png';

        QRcode::png("/proforma/verFormulario?idViaje=$idViaje", $direccion . $nombre);
    }

}