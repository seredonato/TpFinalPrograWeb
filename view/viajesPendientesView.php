{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Viajes Pendientes</h2>
        <hr>
        <div class="row my-5">
            {{#viajesPendientes}}
            {{>informacionViajesPendientes}}
            {{/viajesPendientes}}
        </div>
    </div>
</main>

{{> footer}}