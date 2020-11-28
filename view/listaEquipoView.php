{{> header}}
<main class="cuerpoindex">
    <h2 class="text-center p-3"> Equipos </h2>

    {{>registrarEquipo}}


    <div class="row my-5">
        {{#equipos}}
        {{>informacionEquipos}}
        {{/equipos}}
    </div>

</main>
{{> footer}}