{{> header}}
<main class="cuerpoindex" style="padding-left: 3%; padding-right: 3%">

    <h2 class="titulosindex text-center mt-2">Todos los Usuarios</h2>
    <table class="table">
        <thead>
        <tr class="text-center">
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

</main>
{{> footer}}