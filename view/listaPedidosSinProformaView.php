{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios">
        <h2 class="titulosindex text-center">Pedidos Sin Proforma Hecha</h2>
        <hr>
        <a href="/listaPedidos/listaPedidosView" type="button" class="btn text-white" style="background: #1E0C80">Todos los pedidos</a>
        <a href="/listaPedidos/pedidosPendientes" type="button" class="btn text-white" style="background: #1E0C80">Pedidos Pendientes</a>
        <a href="/listaPedidos/pedidosActivos" type="button" class="btn text-white" style="background: #1E0C80">Pedidos Activos</a>
        <a href="/listaPedidos/pedidosFinalizados" type="button" class="btn text-white" style="background: #1E0C80">Pedidos Finalizados</a>
        <div class="row my-5">
            {{#pedidosNoProforma}}
            {{>informacionPedidos}}
            {{/pedidosNoProforma}}
        </div>
    </div>
</main>

{{> footer}}
