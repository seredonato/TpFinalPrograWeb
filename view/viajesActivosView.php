{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Viajes Activos</h2>
        <hr>
        <a href="/viajes/viajesPendientes" type="button" class="btn text-white mt-1" style="background: #1E0C80">Viajes Pendientes</a>
        <a href="/viajes/viajesFinalizados" type="button" class="btn text-white mt-1" style="background: #1E0C80">Viajes Finalizados</a>
        <a href="/viajes/viajes" type="button" class="btn text-white mt-1" style="background: #1E0C80">Ver todos los viajes</a>
        <div class="row my-5">
            {{#viajesActivos}}
            {{>informacionViajesActivos}}
            {{/viajesActivos}}
        </div>
    </div>
</main>

{{> footer}}