{{> header}}

<main class="cuerpoindex" style="padding-left: 1em; padding-right: 1em">
    <div class="container mt-2 listaUsuarios text-center" style="margin-bottom: 2%">
        <h2 class="titulosindex  text-center"> Tractores </h2>
        <hr>
    </div>
    {{>registrarTractor}}

    {{#registroTractorError}}
    <label class="text-danger m-3" for="patente">{{registroTractorError}}</label>
    {{/registroTractorError}}

    <div class="table-responsive-xl">
    <table class="table">
        <thead>
        <tr class="text-center table-active">
            <th scope="col">ID</th>
            <th scope="col">MARCA</th>
            <th scope="col">MODELO</th>
            <th scope="col">PATENTE</th>
            <th scope="col">CHASIS</th>
            <th scope="col">KILOMETRAJE</th>
            <th scope="col">Nº MOTOR</th>
            <th scope="col">ESTADO</th>
            <th scope="col">CALENDARIO</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        {{#tractores}}
        {{>informacionTractores}}
        {{/tractores}}
        {{^tractores}}
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
        {{/tractores}}
        </tbody>
    </table>
    </div>
</main>




{{> footer}}