{{> header}}

<main class="cuerpoindex">
    {{#tractorPorId}}
    <h2 class="text-center p-3"> Calendario de servicio {{id}}</h2>
    {{/tractorPorId}}


    <div class="row my-5 p-4">
        {{#calendario}}
        {{>informacionCalendario}}
        {{/calendario}}
    </div>

</main>
{{> footer}}