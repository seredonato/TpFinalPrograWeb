{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Todos los Pedidos</h2>
        <hr>
        <a href="/listaPedidos/pedidosSinProforma" type="button" class="btn btn-dark">Pedidos Sin Proforma</a>
        <a href="/listaPedidos/pedidosPendientes" type="button" class="btn btn-dark">Pedidos Pendientes</a>
        <a href="/listaPedidos/pedidosActivos" type="button" class="btn btn-dark">Pedidos Activos</a>
        <a href="/listaPedidos/pedidosFinalizados" type="button" class="btn btn-dark">Pedidos Finalizados</a>
        <div class="row my-5">
            {{#pedidos}}
            {{>informacionPedidos}}
            {{/pedidos}}
        </div>
    </div>
</main>

{{> footer}}