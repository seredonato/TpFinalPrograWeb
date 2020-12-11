{{> header}}

<main class="cuerpoindex">
    <div class="container">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{imagen}}" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{usuario}}</h4>

                                    <a data-toggle="modal" data-target="#modificar" type="button" class="btn btn-secondary" >Modificar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nombre</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{nombre}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Apellido</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{apellido}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Fecha de Nacimiento</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{fecha_nacimiento}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Rol</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{rol}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tipo de Licencia</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{tipo_licencia}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Imagen de Perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/perfil/cambiarImagenPerfil/id={{id}}" style="margin-bottom: 10px" enctype="multipart/form-data" method="post" >
                        <div class="form-group">
                            <label for="rol">Seleccionar el rol que desea asignar</label>
                            <input type="file" name="imagen" required>
                        </div>
                        <button type="submit" class="btn btn-dark btn-lg btn-block">Cambiar imagen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

{{> footer}}