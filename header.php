<!DOCTYPE html>
<html lang="es">
<title>Trabajo Práctico Final</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="estilos.css">
<link rel="icon" type="image/png" href="./img/logoQ.jpg" /> <!-- LOGO EN EL EL COSO DEL NAV , DSP CAMBIENLO KLS -->
<body>


<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="index.php #home" class="w3-bar-item w3-button"><b>FFAS</b> Viajes</a>
        <div class="w3-right w3-hide-small">
            <a href="#viajes" class="w3-bar-item w3-button">Transportes</a>
            <a onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button">Iniciar Sesión</a>
            <a href="registro.php" class="w3-bar-item w3-button">Registrarse</a>
            <a href="index.php #contact" class="w3-bar-item w3-button">Contacto</a>
        </div>
    </div>
</div>

<!-- MODAL PARA INICIAR SESIÓN -->

<div id="id01" class="w3-modal">
    <div class="w3-modal-content">
        <div class="w3-container">
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <div class="w3-center"><br>
                <img src="./img/logoPerfil.png" alt="Avatar" style="width:15%" class="w3-circle w3-margin-top">
            </div>

            <div class="w3-container">
                <div class="w3-section">
                    <input class="w3-input w3-border w3-hover-border-black w3-margin-bottom" type="text" placeholder="Email" required>
                    <input class="w3-input w3-border w3-hover-border-black" type="text" placeholder="Contraseña" required>
                    <div class="w3-center">
                        <button class="w3-button w3-black w3-section w3-block">Login</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
