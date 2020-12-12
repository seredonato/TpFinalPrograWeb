{{> header}}
<main class="cuerpoindex" style="padding-left: 1em; padding-right: 1em">
    <div class="container mt-2 listaUsuarios text-center" style="margin-bottom: 2%">
    <h2 class="titulosindex text-center mt-2">Todos los Pedidos</h2>
    <hr>
        <a href="/listaPedidos/pedidosSinProforma" type="button" class="btn text-white" style="background: #1E0C80">Pedidos Sin Proforma</a>
        <a href="/listaPedidos/pedidosPendientes" type="button" class="btn text-white" style="background: #1E0C80">Pedidos Pendientes</a>
        <a href="/listaPedidos/pedidosActivos" type="button" class="btn text-white" style="background: #1E0C80">Pedidos Activos</a>
        <a href="/listaPedidos/pedidosFinalizados" type="button" class="btn text-white" style="background: #1E0C80">Pedidos Finalizados</a>
    </div>
    <table class="table">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">CUIT</th>
            <th scope="col">FECHA</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">TELEFONO</th>
            <th scope="col">DIRECCION CLIENTE</th>
            <th scope="col">ORIGEN SOLICITADO</th>
            <th scope="col">DESTINO SOLICITADO</th>
            <th scope="col">PROFORMA</th>
            <th scope="col">REPORTES</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        {{#pedidos}}
        {{>informacionPedidos}}
        {{/pedidos}}
        {{^pedidos}}
        <tr class="text-center">
            <th scope="row">--</th>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
        </tr>
        {{/pedidos}}
        </tbody>
    </table>

</main>

{{> footer}}