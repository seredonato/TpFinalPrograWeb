{{> header}}
<main class="cuerpoindex" style="padding-left: 1em; padding-right: 1em">
    <div class="container mt-2 listaUsuarios">
    <h2 class="titulosindex  text-center"> Tipos de acoplados </h2>
    <hr>
    </div>
    {{>registrarAcoplado}}

    {{#registroAcopladoError}}
    <label class="text-danger m-3" for="acoplado">{{registroAcopladoError}}</label>
    {{/registroAcopladoError}}


    <table class="table">
        <thead>
        <tr class="text-center table-active">
            <th scope="col">ID</th>
            <th scope="col">TIPO</th>
            <th scope="col">PATENTE</th>
            <th scope="col">CHASIS</th>
            <th scope="col">ESTADO</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        {{#acoplados}}
        {{>informacionAcoplados}}
        {{/acoplados}}
        {{^acoplados}}
        <tr class="text-center">
            <th scope="row">--</th>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
        </tr>
        {{/acoplados}}
        </tbody>
    </table>
</main>
{{> footer}}