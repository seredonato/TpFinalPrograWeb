{{> header}}
<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Todos los usuarios</h2>
        <hr>
        <div class="row my-5">
            {{#usuarios}}
            {{>informacionUsuarios}}
            {{/usuarios}}
        </div>
    </div>
</main>
{{> footer}}