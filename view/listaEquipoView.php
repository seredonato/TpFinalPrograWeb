{{> header}}
<main class="cuerpoindex">

        {{>registrarEquipo}}

    <div class="d-flex p-2 justify-content-center">
        <a href="/ListaTractor" class="btn btn-dark"> Ver tractores</a>
        <a href="/ListaAcoplado" class="btn btn-dark ml-2"> Ver acoplado</a>
    </div>

    <div class="row my-5">
        {{#equipos}}
        {{>informacionEquipos}}
        {{/equipos}}
    </div>

</main>
{{> footer}}