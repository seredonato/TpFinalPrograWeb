{{> header}}
<main class="container justify-content-center" id="contenedor-registro">
    <h3 class="mt-3 text-center display-4">Registro</h3>
    <hr>
    <form action="/registro/registroUsuario" enctype="multipart/form-data" method="post" class="mt-3">
        <div class="form-row mt-4 mb-3">
            <div class="col">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control"placeholder="Ingrese su Nombre" required name="nombre">
            </div>
            <div class="col">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" placeholder="Ingrese su Apellido" required name="apellido">
            </div>
            <div class="col">
                <label for="dni">DNI:</label>
                <input type="number" class="form-control" placeholder="Ingrese su DNI" required name="dni">
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Ingrese su Email" required name="email">
            {{#emailAsociado}}
            <label class="text-danger" for="email">{{emailAsociado}}</label>
            {{/emailAsociado}}
        </div>
        <div class="form-group">
            <label for="usuario">Nombre de Usuario:</label>
            <input type="text" class="form-control" placeholder="Ingrese su Nombre de Usuario" required name="usuario">
            {{#usuarioExistente}}
            <label class="text-danger" for="usuario">{{usuarioExistente}}</label>
            {{/usuarioExistente}}
        </div>


        <div class="form-group">
            <label for="contrasenia">Contraseña:</label>
            <input type="password" class="form-control" placeholder="Ingrese su Contraseña" required name="contrasenia">
        </div>

        <div class="form-group">
            <label for="contrasenia2">Confirme Contraseña:</label>
            <input type="password" class="form-control" placeholder="Repita su Contraseña" required name="contrasenia2">
            {{#contraseñaDiferente}}
            <label class="text-danger" for="contraseña">{{contraseñaDiferente}}</label>
            {{/contraseñaDiferente}}
        </div>

        <div class="form-group">
            <label for="fechaNacimiento">Ingrese su Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id=birthday required name=fechaNacimiento>
        </div>

        <div class="mt-4 mb-4 text-center">
            <button type="submit" class="btn btn-dark btn-lg btn-block">Registrarse</button>
        </div>
    </form>

</main>
{{> footer}}

