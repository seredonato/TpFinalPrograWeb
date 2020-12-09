{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Viajes Activos</h2>
        <hr>
        <div class="row my-5">
            {{#viajesActivos}}
            {{>informacionViajesActivos}}
            {{/viajesActivos}}
        </div>
    </div>
</main>

{{> footer}}