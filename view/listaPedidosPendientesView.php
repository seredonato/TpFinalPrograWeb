{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Pedidos Pendientes</h2>
        <hr>
        <div class="row my-5">
            {{#pedidosPendientes}}
            {{>informacionPedidosConProforma}}
            {{/pedidosPendientes}}
        </div>
    </div>
</main>

{{> footer}}