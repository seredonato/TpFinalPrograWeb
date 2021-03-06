{{> header}}
<main class="cuerpoindex">
    {{#tractorPorId}}
    <div class="container mt-2 listaUsuarios"  style="margin-bottom: 2%">
    <h2 class="titulosindex text-center"> Calendario </h2>
    <hr>
    <div class="d-flex p-2 justify-content-center">
        {{#valorMecanico}}
        <button type="button" class="btn text-white" style="background: #ffa420" data-toggle="modal" data-target="#modalRegistrarCalendario">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg> Agregar fecha </button>
        {{/valorMecanico}}
        <a href="/ListaEquipo" class="btn text-white ml-2" style="background: #1E0C80">Equipos</a>
        <a href="/ListaAcoplado" class="btn text-white ml-2" style="background: #1E0C80">Acoplado</a>
        <a href="/ListaTractor" class="btn text-white ml-2" style="background: #1E0C80">Tractores</a>
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
        <div class="table-responsive-xl">
        <table class="table">
            <thead>
            <tr class="text-center table-active" style="background: #aeaeae">
                <th scope="col">ID</th>
                <th scope="col">FECHA</th>
                <th scope="col">ID (TRACTOR)</th>
                {{#valorSupervisor}}
                <th scope="col">ESTADO</th>
                {{/valorSupervisor}}
                {{#valorMecanico}}
                <th scope="col">ESTADO</th>
                <th scope="col">SERVICE</th>
                <th scope="col"></th>
                <th scope="col">OPCIONES</th>
                {{/valorMecanico}}

            </tr>
            </thead>
            <tbody>
            {{#calendarioSinCumplir}}
            {{>informacionCalendario}}
            {{/calendarioSinCumplir}}

            {{#calendario}}
            {{>informacionCalendarioCumplido}}
            {{/calendario}}

            {{^calendarioSinCumplir}}
            {{^calendario}}
            <tr class="text-center">
                <th scope="row">--</th>
                <td>--</td>
                <td>--</td>

                {{#valorSupervisor}}
                <td>--</td>
                {{/valorSupervisor}}

                {{#valorMecanico}}
                <td>--</td>
                <td>--</td>
                <td>--</td>
                {{/valorMecanico}}
            </tr>
            {{/calendario}}
            {{/calendarioSinCumplir}}

            </tbody>
        </table>
        </div>
    </div>

</main>
{{> footer}}