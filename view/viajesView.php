{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Viajes</h2>
        <hr>
        <a href="/viajes/viajesPendientes" type="button" class="btn text-white mt-1" style="background: #1E0C80">Viajes Pendientes</a>
        <a href="/viajes/viajesActivos" type="button" class="btn text-white mt-1" style="background: #1E0C80">Viajes Activos</a>
        <a href="/viajes/viajesFinalizados" type="button" class="btn text-white mt-1" style="background: #1E0C80">Viajes Finalizados</a>
        <div class="row my-5">
            {{#viajes}}
            {{>informacionViajes}}
            {{/viajes}}
        </div>
    </div>
</main>

{{> footer}}
