{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Viajes Finalizados</h2>
        <hr>
        <div class="row my-5">
            {{#viajesFinalizados}}
            {{>informacionViajes}}
            {{/viajesFinalizados}}
        </div>
    </div>
</main>

{{> footer}}