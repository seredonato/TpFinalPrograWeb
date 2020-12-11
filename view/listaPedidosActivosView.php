{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Pedidos Activos</h2>
        <hr>
        <a href="/listaPedidos/pedidosSinProforma" type="button" class="btn text-white mt-2" style="background: #1E0C80">Pedidos Sin Proforma</a>
        <a href="/listaPedidos/pedidosPendientes" type="button" class="btn text-white mt-2" style="background: #1E0C80">Pedidos Pendientes</a>
        <a href="/listaPedidos/listaPedidosView" type="button" class="btn text-white mt-2" style="background: #1E0C80">Todos los pedidos</a>
        <a href="/listaPedidos/pedidosFinalizados" type="button" class="btn text-white mt-2" style="background: #1E0C80">Pedidos Finalizados</a>
        <div class="row my-5">
            {{#pedidosActivos}}
            {{>informacionPedidosConProforma}}
            {{/pedidosActivos}}
        </div>
    </div>
</main>

{{> footer}}
