{{> header}}
<main class="cuerpoindex">

        {{>registrarEquipo}}

        <div class="row my-5">
        {{#equipos}}
        {{>informacionEquipos}}
        {{/equipos}}
        </div>

</main>
{{> footer}}