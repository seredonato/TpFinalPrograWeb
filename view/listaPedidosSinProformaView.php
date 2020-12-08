{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Pedidos Sin Proforma Hecha</h2>
        <hr>
        <div class="row my-5">
            {{#pedidosNoProforma}}
            {{>informacionPedidos}}
            {{/pedidosNoProforma}}
        </div>
    </div>
</main>

{{> footer}}
