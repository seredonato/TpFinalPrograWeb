{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Pedidos Pendientes</h2>
        <hr>
        <a href="/listaPedidos/pedidosSinProforma" type="button" class="btn text-white mt-2" style="background: #1E0C80">Pedidos Sin Proforma</a>
        <a href="/listaPedidos/listaPedidosView" type="button" class="btn text-white mt-2" style="background: #1E0C80">Todos los pedidos</a>
        <a href="/listaPedidos/pedidosActivos" type="button" class="btn text-white mt-2" style="background: #1E0C80">Pedidos Activos</a>
        <a href="/listaPedidos/pedidosFinalizados" type="button" class="btn text-white mt-2" style="background: #1E0C80">Pedidos Finalizados</a>
        <div class="row my-5">
            {{#pedidosPendientes}}
            {{>informacionPedidosConProforma}}
            {{/pedidosPendientes}}
        </div>
    </div>
</main>

{{> footer}}