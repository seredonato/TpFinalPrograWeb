{{> header}}
<main class="cuerpoindex">
    <h2 class="text-center p-3"> Tipos de acoplados </h2>

    {{>registrarAcoplado}}

    {{#registroAcopladoError}}
    <label class="text-danger m-3" for="acoplado">{{registroAcopladoError}}</label>
    {{/registroAcopladoError}}

    <div class="row my-5 p-4">
    {{#acoplados}}
    {{>informacionAcoplados}}
    {{/acoplados}}
    </div>
</main>

{{> footer}}