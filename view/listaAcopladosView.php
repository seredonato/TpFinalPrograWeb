{{> header}}
<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios">
    <h2 class="titulosindex  text-center"> Tipos de acoplados </h2>
    <hr>
    </div>
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