{{> header}}
<main class="cuerpoindex">
    {{#tractorPorId}}
    <div class="container mt-2 listaUsuarios text-center">
    <h2 class="titulosindex"> Calendario </h2>
    <hr>
    <div class="d-flex p-2 justify-content-center">
        {{#valorMecanico}}
        <button type="button" class="btn btn-dark mr-2 ml-2" data-toggle="modal" data-target="#modalRegistrarCalendario">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg> Agregar fecha </button>
        {{/valorMecanico}}
        <a href="/ListaEquipo" class="btn btn-dark"> Ver equipos</a>
        <a href="/ListaAcoplado" class="btn btn-dark ml-2"> Ver acoplado</a>
        <a href="/ListaTractor" class="btn btn-dark ml-2"> Ver a tractores</a>
    </div>


    <div class="modal fade" id="modalRegistrarCalendario">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Calendario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/listaTractor/registrarCalendarioTractor" enctype="multipart/form-data" method="post" >
                        <label for="id">Id del Tractor</label>
                        <textarea class="form-control" style="height: 36px" name="id" id="id" >{{id}}</textarea>

                        <div class="form-group">
                            <label for="tractor">Día</label>
                            <input type="date" class="form-control" id="dia" name="dia"
                                   required>
                        </div>
                        <button type="submit" class="btn btn-dark btn-lg btn-block">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{/tractorPorId}}

    
    <div class="row my-5 p-4">
        {{#calendario}}
        {{>informacionCalendario}}
        {{/calendario}}
    </div>

</main>
{{> footer}}