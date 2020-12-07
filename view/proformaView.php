{{> header}}

<main class="cuerpoindex">

    <div class="container text-center">
        <h2 class="titulosindex">Realice proforma</h2>
        <form action="/proforma/guardarProforma/id={{pedidoId}}" method="post" enctype="multipart/form-data" class="mt-3">
            <div class="row" style="margin-bottom: 2%">
                <div class="card-body my-5" style="width: 45%; margin-bottom: 2%!important;">
                    <h5 class="card-title">Pedido</h5>
                    <div style="text-align: left">
                        <p class="card-text">ID PEDIDO: {{pedidoId}}</p>
                        <p class="card-text">NOMBRE: {{pedidoNombre}}</p>
                        <p class="card-text">FECHA PEDIDO: {{pedidoFecha}}</p>
                        <p class="card-text">CUIT: {{pedidoCuit}}</p>
                        <p class="card-text">EMAIL: {{pedidoEmail}}</p>
                        <p class="card-text">TELEFONO: {{pedidoTelefono}}</p>
                        <p class="card-text">DIRECCION CLIENTE: {{pedidoDireccion}}</p>
                        <p class="card-text">DIRECCION DE CONTACTO 1: {{pedidoContacto1}}</p>
                        <p class="card-text">DIRECCION DE CONTACTO 2: {{pedidocontacto2}}</p>
                    </div>
                </div>

                <div class="card-body my-5" style="width: 45%; margin-bottom: 2%!important;">
                    <h5 class="card-title">Viaje</h5>
                    <div style="text-align: left">
                        <div class="form-row mt-4 mb-3">
                            <div class="col">

                                <label for="origen">Origen</label>
                                <input type="text" class="form-control" style="margin-bottom: 2%" placeholder="Origen"
                                       required name="origen">

                                <label for="destino">Destino</label>
                                <input type="text" class="form-control" style="margin-bottom: 2%" placeholder="Destino"
                                       required name="destino">

                                <label for="fechaCarga">Fecha de Carga</label>
                                <input type="date" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Fecha de Carga" required name="fechaCarga">

                                <label for="horaCarga">Tiempo estimado de carga</label>
                                <input type="time" class="form-control" style="margin-bottom: 2%" placeholder="horaCarga"
                                       required name="horaCarga">

                                <label for="fechaLlegada">Fecha de Llegada</label>
                                <input type="date" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Fecha de Llegada" required name="fechaLlegada">

                                <label for="horaLlegada">Tiempo estimado de llegada</label>
                                <input type="time" class="form-control" style="margin-bottom: 2%" placeholder="horaLlegada"
                                       required name="horaLlegada">

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card-body my-5" style="width: 45%; margin-top: 2%!important;">
                    <h5 class="card-title">Carga</h5>
                    <div style="text-align: left">
                        <div class="form-row mt-4 mb-3">
                            <div class="col">

                                <label for="tipo">Tipo de carga</label>
                                <select id="tipo" name="tipo" class="form-control" style="margin-bottom: 2%" required>
                                    <option value="" selected>Tipo de cargas</option>
                                    <option value="Granel">Granel</option>
                                    <option value="Liquida">Liquida</option>
                                    <option value="Container20">Container 20''</option>
                                    <option value="Container40">Container 40''</option>
                                    <option value="Jaula">Jaula</option>
                                    <option value="CarCarrier">Car Carrier</option>
                                </select>

                                <label for="peso">Peso neto</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%" placeholder="peso"
                                       required name="peso">

                                <label for="hazardSi">Hazard</label>
                                <div>
                                    <label for="hazardSi">SI</label>
                                    <input value="si" type="radio" onclick="mostrarSelectHazard()"
                                           style="margin-bottom: 2%; margin-right: 5%"
                                           required name="hazardSi">

                                    <label for="hazardNo">NO</label>
                                    <input value="no" type="radio" onclick="ocultarSelectHazard()"
                                           style="margin-bottom: 2%"
                                           required name="hazardSi">
                                </div>

                                <div id="imoclass" style="display: none">
                                    <select id="imoclass" name="imoClass" class="form-control" style="margin-bottom: 2%">
                                        <option value="0" selected>Clases - Descripcion</option>
                                        {{#imoClases}}
                                        <option value="{{clase}}">{{clase}} - {{descripcion}}</option>
                                        {{/imoClases}}
                                    </select>

                                    <select id="imoSubClases" name="imoSubClass" class="form-control"
                                            style="margin-bottom: 2%">
                                        <option value="0" selected>Clases - Subclase - Descripcion de subclase</option>
                                        {{#imoSubClases}}
                                        <option value="{{subclase}}">{{clase}} - {{subclase}} - {{descripcion}}</option>
                                        {{/imoSubClases}}
                                    </select>

                                </div>

                                <label>Reefer</label>
                                <div>
                                    <label for="temperaturaSi">SI</label>
                                    <input value="si" type="radio" onclick="mostrarSelectTemperatura()"
                                           style="margin-bottom: 2%; margin-right: 5%"
                                           required name="temperaturaSi">

                                    <label for="temperaturaSi">NO</label>
                                    <input value="no" type="radio" onclick="ocultarSelectTemperatura()"
                                           style="margin-bottom: 2%"
                                           name="temperaturaSi">
                                </div>

                                <div id="temperatura" style="display: none">
                                    <label for="temperatura">Temperatura</label>
                                    <input type="number" class="form-control"
                                           style="margin-bottom: 2%" placeholder="Temperatura en Cº"
                                           required name="temperatura">
                                </div>
                            </div>
                            <div>
                                <h5 class="card-title" style="text-align: center">Seleccionar Chofer</h5>
                                <div class="container mt-2 justify-content-center" style="margin-left: 0;margin-right: 0">
                                    <div class="row my-5 contenedorChoferes">

                                        {{#choferes}}
                                        {{> informacionChoferes}}
                                        {{/choferes}}


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body my-5" style="width: 45%; margin-top: 2%!important;">
                    <h5 class="card-title">Costeo Estimado</h5>
                    <div style="text-align: left">
                        <div class="form-row mt-4 mb-3">
                            <div class="col">

                                <label for="kilometros">Kilometros</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Kilometros estimados"
                                       required name="kilometros">

                                <label for="combustible">Combustible</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Combustible estimado"
                                       required name="combustible">

                                <label for="horaSalida">Tiempo estimado de salida</label>
                                <input type="time" class="form-control" style="margin-bottom: 2%"
                                       placeholder="ETD estimado"
                                       required name="horaSalida">

                                <label for="horaLlegada">Tiempo estimado de llegada</label>
                                <input type="time" class="form-control" style="margin-bottom: 2%"
                                       placeholder="ETA estimado"
                                       required name="horaLlegada">

                                <label for="viaticos">Viaticos</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Viaticos estimado"
                                       required name="viaticos">

                                <label for="peajes">Peajes y pesajes</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Peajes y Pesajes estimado"
                                       required name="peajes">

                                <label for="extras">Extras</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Extras estimado"
                                       required name="extras">

                                <label for="fee">Fee</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Fee estimado"
                                       required name="fee">

                                <label for="total">Total</label>
                                <input type="number" class="form-control" style="margin-bottom: 2%"
                                       placeholder="Total estimado"
                                       required name="total">
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="mt-4 mb-4 text-center">
                <button type="submit" class="btn btn-dark btn-lg btn-block">Realizar Proforma</button>
            </div>

        </form>
    </div>

</main>

{{> footer}}