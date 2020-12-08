{{> header}}
<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios">
    <h2 class="titulosindex text-center"> Equipos </h2>
    <hr>
    </div>
    {{>registrarEquipo}}

    {{#registroEquipoError}}
    <label class="text-danger m-3" for="patente">{{registroEquipoError}}</label>
    {{/registroEquipoError}}

    <div class="row my-5 p-4">
        {{#equipos}}
        {{>informacionEquipos}}
        {{/equipos}}
    </div>
    </div>

</main>
{{> footer}}