{{> header}}
<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Todos los usuarios</h2>
        <div class="row my-5">
            {{#usuarios}}
            {{>informacionUsuarios}}
            {{/usuarios}}
        </div>
    </div>
</main>

{{> footer}}