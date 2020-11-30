{{> header}}

<main class="cuerpoindex">
    <h2 class="text-center p-3"> Tractores </h2>
    {{>registrarTractor}}

    {{#registroTractorError}}
    <label class="text-danger m-3" for="patente">{{registroTractorError}}</label>
    {{/registroTractorError}}

    <div class="row my-5 p-4">
        {{#tractores}}
        {{>informacionTractores}}
        {{/tractores}}
    </div>
</main>




{{> footer}}