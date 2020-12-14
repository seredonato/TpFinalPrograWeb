{{> header}}
<main class="cuerpoindex" style="padding-left: 1em; padding-right: 1em">
    <div class="container mt-2 listaUsuarios">
    <h2 class="titulosindex text-center"> Equipos </h2>
    <hr>
    </div>
    {{>registrarEquipo}}

    {{#registroEquipoError}}
    <label class="text-danger m-3" for="patente">{{registroEquipoError}}</label>
    {{/registroEquipoError}}

    <div class="table-responsive-xl">
        <table class="table">
        <thead>
        <tr class="text-center table-active">
            <th scope="col">ID</th>
            <th scope="col">MODELO<br>(TRACTOR)</th>
            <th scope="col">PATENTE<br>(TRACTOR)</th>
            <th scope="col">KILOMETRAJE<br>(TRACTOR)</th>
            <th scope="col">TRACTOR</th>
            <th scope="col">TIPO<br>(ACOPLADO)</th>
            <th scope="col">PATENTE<br>(ACOPLADO)</th>
            <th scope="col">ACOPLADO</th>
            <th scope="col">ESTADO</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        {{#equipos}}
        {{>informacionEquipos}}
        {{/equipos}}
        {{^equipos}}
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
        {{/equipos}}
        </tbody>
    </table>
    </div>

</main>
{{> footer}}