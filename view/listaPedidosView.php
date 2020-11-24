{{> header}}

<main class="cuerpoindex">
    <div class="container mt-2 listaUsuarios text-center">
        <h2 class="titulosindex">Todos los pedidos</h2>
        <div class="row my-5">
            {{#pedidos}}
            {{>informacionPedidos}}
            {{/pedidos}}
        </div>
    </div>
</main>

{{> footer}}