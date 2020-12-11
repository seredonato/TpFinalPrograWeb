{{> header}}

<main class="cuerpoindex">
<div class="container text-center mt-5">
    <h2 class="titulosindex">Cargar QR</h2>
    <hr>

    {{#error}}
    <label class="text-danger m-3">Ya se ha realizado un reporte en el dia de la fecha</label>
    {{/error}}
    {{#errorPendiente}}
    <label class="text-danger m-3">No se puede hacer un reporte de un viaje no comenzado</label>
    {{/errorPendiente}}
    {{#errorFinalizado}}
    <label class="text-danger m-3">Este viaje ya finaliz&oacute;</label>
    {{/errorFinalizado}}

    <p>Por favor, suba la imagen QR y aprete enviar. De esta manera, podrá realizar el Reporte del viaje correspondiente.</p>
            <form action="/qr/decodificarQr" method="post" enctype="multipart/form-data">
                <input type="file" name="qrimage" id="qrimage" class="mt-2 mb-4" required=""><br>
                <input type="submit" class="btn btn-md btn-block btn-dark mb-3" value="Enviar" name="">
            </form>
    </div>
</div>
</main>
{{> footer}}
