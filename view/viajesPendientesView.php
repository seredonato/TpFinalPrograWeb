{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Viajes Pendientes</h2>
        <hr>
        <a href="/viajes/viajesActivos" type="button" class="btn text-white" style="background: #1E0C80">Viajes Activos</a>
        <a href="/viajes/viajesFinalizados" type="button" class="btn text-white" style="background: #1E0C80">Viajes Finalizados</a>
        <a href="/viajes/viajes" type="button" class="btn text-white" style="background: #1E0C80">Ver todos los viajes</a>
        <div class="row my-5">
            {{#viajesPendientes}}
            {{>informacionViajesPendientes}}
            {{/viajesPendientes}}
        </div>
    </div>
</main>

{{> footer}}