
<?php
include_once ("header.php");
?>

    <div class="w3-container registrocontenedor w3-display-middle">
        <form action="/action_page.php" target="_blank" class="w3-third w3-padding">
            <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Registrarse</h3>
            <input class="w3-input w3-border" type="text" placeholder="Ingrese su nombre y apellido" required name="nombre">
            <input class="w3-input w3-section w3-border" type="text" placeholder="Ingrese su email" required name="email">
            <input class="w3-input w3-section w3-border" type="number" placeholder="Ingrese su documento" required name="dni">
            <input class="w3-input w3-section w3-border" type="password" placeholder="Ingrese su contraseña" required name="clave">
            <input class="w3-input w3-section w3-border" type="password" placeholder="Repita su contraseña" required name="clave">
            <label><p>Ingrese fecha de nacimiento</p></label>
            <input type="date" id="birthday" name="birthday" required>
            <button class="w3-button w3-black w3-section w3-block" type="submit">
                    <i class="fa fa-paper-plane"></i> Enviar
                </button>
        </form>
    </div>
    <!-- End page content -->
<?php
 /* include_once ("footer.php.php");  PROBLEMAS TECNICOS CON EL DISPLAY DE ARRIBA , JDFKSD*/
?>
