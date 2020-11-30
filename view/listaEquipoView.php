{{> header}}
<main class="cuerpoindex">
    <h2 class="text-center p-3"> Equipos </h2>

    {{>registrarEquipo}}

    {{#registroEquipoError}}
    <label class="text-danger m-3" for="patente">{{registroEquipoError}}</label>
    {{/registroEquipoError}}

    <div class="row my-5 p-4">
        {{#equipos}}
        {{>informacionEquipos}}
        {{/equipos}}
    </div>

</main>
{{> footer}}