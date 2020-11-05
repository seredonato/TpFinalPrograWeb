<?php
include_once("header.php");
?>

<div class="container justify-content-center" id="contenedor-registro">
    <h3 class="mt-3 text-center display-4">Registro</h3>
    <hr>
    <form action="#" enctype="multipart/form-data" method="post" class="mt-3">
        <div class="form-row mt-4 mb-3">
            <div class="col">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" placeholder="Ingrese su Nombre" required name="email">
            </div>
            <div class="col">
                <label for="dni">DNI:</label>
                <input type="number" class="form-control" placeholder="Ingrese su DNI" required name="dni">
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Ingrese su Email" required name="email">
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" placeholder="Ingrese su Contraseña" required name="password">
        </div>

        <div class="form-group">
            <label for="password">Confirme Contraseña:</label>
            <input type="password" class="form-control" placeholder="Repita su Contraseña" required name="password">
        </div>

        <div class="form-group">
            <label for="genero">Ingrese su Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id=birthday required name=birthday>
        </div>

        <div class="mt-4 mb-4 text-center">
            <button type="submit" class="btn btn-dark btn-lg btn-block">Registrarse</button>
        </div>
    </form>

</div>

<?php
    include_once ("footer.php");
?>
