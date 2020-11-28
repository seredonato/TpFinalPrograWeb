{{> header}}

<main class="cuerpoindex">
    <h2 class="text-center p-3"> Tractores </h2>
    {{>registrarTractor}}
    <div class="row my-5">
        {{#tractores}}
        {{>informacionTractores}}
        {{/tractores}}
    </div>
</main>




{{> footer}}