{{> header}}
<main class="cuerpoindex" style="padding-left: 3%; padding-right: 3%">
    <div class="container mt-2 listaUsuarios text-center" style="margin-bottom: 2%">
    <h2 class="titulosindex text-center mt-2">Todos los Usuarios</h2>
        <hr>
    <div class="table-responsive-xl">
    <table class="table">
        <thead>
        <tr class="text-center table-active">
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDO</th>
            <th scope="col">DNI</th>
            <th scope="col">USUARIO</th>
            <th scope="col">EMAIL</th>
            <th scope="col">FECHA DE NACIMIENTO</th>
            <th scope="col">TIPO DE LICENCIA</th>
            <th scope="col">ROL</th>
            <th scope="col">OPCIONES</th>

        </tr>
        </thead>
        <tbody>
        {{#usuarios}}
        {{>informacionUsuarios}}
        {{/usuarios}}
        </tbody>
    </table>
    </div>
    </div>

</main>
{{> footer}}