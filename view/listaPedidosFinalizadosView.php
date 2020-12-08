{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Pedidos Finalizados</h2>
        <hr>
        <div class="row my-5">
            {{#pedidosFinalizados}}
            {{>informacionPedidosConProforma}}
            {{/pedidosFinalizados}}
        </div>
    </div>
</main>

{{> footer}}
