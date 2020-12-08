{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Pedidos</h2>
        <hr>
        <h3>Pedidos Sin Proforma</h3>
        <div class="row my-5">
            {{#pedidosNoProforma}}
            {{>informacionPedidos}}
            {{/pedidosNoProforma}}
        </div>
        <hr>
        <h3>Pedidos Pendientes</h3>
        <div class="row my-5">
            {{#pedidosPendientes}}
            {{>informacionPedidosConProforma}}
            {{/pedidosPendientes}}
        </div>
        <hr>
        <h3>Pedidos Activos</h3>
        <div class="row my-5">
            {{#pedidosActivos}}
            {{>informacionPedidosConProforma}}
            {{/pedidosActivos}}
        </div>
        <hr>
        <h3>Pedidos Finalizados</h3>
        <div class="row my-5">
            {{#pedidosFinalizados}}
            {{>informacionPedidosConProforma}}
            {{/pedidosFinalizados}}
        </div>
    </div>
</main>

{{> footer}}