{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Pedidos Activos</h2>
        <hr>
        <div class="row my-5">
            {{#pedidosActivos}}
            {{>informacionPedidosConProforma}}
            {{/pedidosActivos}}
        </div>
    </div>
</main>

{{> footer}}
