<?php
    $archivoConfiguracion = "./recursos/conexion.ini";
    $configuracion = parse_ini_file($archivoConfiguracion, true);


    $host = $configuracion["bd"]["host"];
    $usuario = $configuracion["bd"]["usuario"];
    $clave = $configuracion["bd"]["password"];
    $bd = $configuracion["bd"]["bd"];

    $conexion = mysqli_connect($host, $usuario, $clave, $bd);

    if ($conexion->connect_error) {
        die("Ha ocurrido un error con la conexion");
    }

?>