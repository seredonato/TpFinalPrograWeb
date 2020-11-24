{{> header}}

<main class="cuerpoindex">

    <div class="container text-center">
        <h2 class="titulosindex">Realize proforma</h2>
        <form method="post"  enctype="multipart/form-data"  class="mt-3">
            <div class="row">
            <div class="card-body my-5"  style="width: 45%">
                <h5 class="card-title">Pedido</h5>
                <div style="text-align: left">
                    <p class="card-text">ID PEDIDO: {{pedidoId}}</p>
                    <p class="card-text">NOMBRE: {{pedidoNombre}}</p>
                    <p class="card-text">CUIT: {{pedidoCuit}}</p>
                    <p class="card-text">EMAIL: {{pedidoEmail}}</p>
                    <p class="card-text">TELEFONO: {{pedidoTelefono}}</p>
                    <p class="card-text">DIRECCION CLIENTE: {{pedidoDireccion}}</p>
                    <p class="card-text">DIRECCION DE CONTACTO 1: {{pedidoContacto1}}</p>
                    <p class="card-text">DIRECCION DE CONTACTO 2: {{pedidocontacto2}}</p>
                </div>
            </div>

                <div class="card-body my-5"  style="width: 45%">
                    <h5 class="card-title">Viaje</h5>
                    <div style="text-align: left">
                        <div class="form-row mt-4 mb-3">
                        <div class="col">

                            <label for="origen">Origen</label>
                            <input type="text" class="form-control" style="margin-bottom: 2%" placeholder="Origen" required name="origen">

                            <label for="destino">Destino</label>
                            <input type="text" class="form-control" style="margin-bottom: 2%" placeholder="Destino" required name="destino">

                            <label for="fechaCarga">Fecha de Carga</label>
                            <input type="date" class="form-control" style="margin-bottom: 2%" placeholder="Fecha de Carga" required name="fechaCarga">

                            <label for="eta">ETA</label>
                            <input type="text" class="form-control" style="margin-bottom: 2%" placeholder="ETA" required name="eta">

                        </div>
                        </div>
                    </div>
                </div>

            </div>



        </form>
    </div>

</main>

{{> footer}}