{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios">
        <h2 class="titulosindex  text-center"> Tractores </h2>
        <hr>
    </div>
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