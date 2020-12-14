{{> header}}

<main class="cuerpoindex" style="padding-left: 3%; padding-right: 3%">
    <div class="container mt-2 listaUsuarios text-center" style="margin-bottom: 2%">
        <h2 class="titulosindex">{{titulo}}</h2>
        <hr>
        <a href="/viajes/viajes" type="button" class="btn mt-1" style="background: #9179ef">TODOS</a>
        <a href="/viajes/viajesPendientes" type="button" class="btn mt-1" style="background: #cbcbcb">PENDIENTES</a>
        <a href="/viajes/viajesActivos" type="button" class="btn mt-1" style="background: #fff6aa">ACTIVOS</a>
        <a href="/viajes/viajesFinalizados" type="button" class="btn mt-1" style="background: #cdfebb">FINALIZADOS</a>
    </div>
    <table class="table">
        <thead>
        <tr class="text-center table-active" style="background: #aeaeae" >
            <th scope="col">ID VIAJE</th>
            <th scope="col">ESTADO</th>
            <th scope="col">ORIGEN</th>
            <th scope="col">DESTINO</th>
            <th scope="col">FECHA DE CARGA</th>
            <th scope="col">FECHA DE SALIDA</th>
            <th scope="col">HORA DE SALIDA</th>
            <th scope="col">HORA DE LLEGADA</th>
            <th scope="col"></th>

        </tr>
        </thead>
        <tbody>


        {{#viajesFinalizados}}
        {{>informacionViajesFinalizados}}
        {{/viajesFinalizados}}
        {{^viajesFinalizados}}
        <tr class="text-center">
            <th scope="row">--</th>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
        </tr>

        {{/viajesFinalizados}}


        </tbody>
    </table>
</main>

{{> footer}}
