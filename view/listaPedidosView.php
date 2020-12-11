{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios">
        <h2 class="titulosindex text-center">Todos los Pedidos</h2>
        <hr>
        <a href="/listaPedidos/pedidosSinProforma" type="button" class="btn text-white" style="background: #1E0C80">Pedidos Sin Proforma</a>
        <a href="/listaPedidos/pedidosPendientes" type="button" class="btn text-white" style="background: #1E0C80">Pedidos Pendientes</a>
        <a href="/listaPedidos/pedidosActivos" type="button" class="btn text-white" style="background: #1E0C80">Pedidos Activos</a>
        <a href="/listaPedidos/pedidosFinalizados" type="button" class="btn text-white" style="background: #1E0C80">Pedidos Finalizados</a>
        <div class="row my-5">
            {{#pedidos}}
            {{>informacionPedidos}}
            {{/pedidos}}
        </div>
    </div>
</main>

{{> footer}}