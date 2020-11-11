{{> header}}

<main class="text-center cuerpoindex">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active imagencarousel">
                <img class="d-block w-100 " src="public/images/indexfoto1.png" alt="First slide">
                <h4 class="text-center">Todos los dias cumpliendo nuestro trabajo</h4>
            </div>
            <div class="carousel-item imagencarousel">
                <img class="d-block w-100" src="public/images/indexfoto2.png" alt="Second slide">
                <h4 class="text-center">Tomamos muchas rutas, pero solo un camino: hacer nuestro trabajo</h4>
            </div>
            <div class="carousel-item imagencarousel">
                <img class="d-block w-100" src="public/images/indexfoto3.png" alt="Third slide">
                <h4 class="text-center">Con seguimiento de carga online. Una clave, una contraseña y es como si estuvieras en el asiento del acompañante</h4>
            </div>
            <div class="carousel-item imagencarousel">
                <img class="d-block w-100" src="public/images/indexfoto4.png" alt="Third slide">
                <h4 class="text-center">Con personal capacitado, en regla y que cumplen con los protocolos</h4>
            </div>
            <div class="carousel-item imagencarousel">
                <img class="d-block w-100" src="public/images/indexfoto5.png" alt="Third slide">
                <h4 class="text-center">A la seguridad y la prevencion la llevamos muy lejos</h4>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container mt-2" id="quienes">
        <h3 class="titulosindex">¿Quiénes Somos?</h3>
        <hr>
        <p>Somos una compañía joven especializada en brindar soluciones logísticas para empresas, comercio y
            e-commerce.
            Con el objetivo de satisfacer las necesidades de cada empresa, un servicio de calidad,
            atención personalizada y tarifas competitivas.
        </p>
    </div>

    <div class="container mt-2 justify-content-center">
        <h3 class="titulosindex">Choferes Destacados de la Semana</h3>
        <hr>
        <div class="row my-5">
            <div class="col-md-4">
                <div class="card choferes"">
                <img src="public/images/logoQ.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Chofer</h5>
                    <p class="card-text">Holaaaaa,
                        soy chofer de TRANSAFF, la mejor empresa.</p>
                    <a href="#" class="btn btn-outline-dark">Contactar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card choferes">
                <img src="public/images/logoQ.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Chofer</h5>
                    <p class="card-text">Holaaaaa,
                        soy chofer de TRANSAFF, la mejor empresa.</p>
                    <a href="#" class="btn btn-outline-dark">Contactar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card choferes">
                <img src="public/images/logoQ.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Chofer</h5>
                    <p class="card-text">Holaaaaa,
                        soy chofer de TRANSAFF, la mejor empresa.</p>
                    <a href="#" class="btn btn-outline-dark">Contactar</a>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="container mt-2" id="contacto">
    <h3 class="titulosindex">Contacto</h3>
    <hr>
    <form action="#" enctype="multipart/form-data" method="post" class="mt-3">
        <div class="form-row mt-4 mb-3">
            <div class="col">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" placeholder="Ingrese su Nombre" required name="email">
            </div>
            <div class="col">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="Ingrese su Email" required name="email">
            </div>
        </div>
        <div class="form-group">
            <label for="asunto">Asunto:</label>
            <input class="form-control" placeholder="Ingrese el Asunto" required name="asunto">
        </div>
        <div class="form-group">
            <label for="consulta">Consulta:</label>
            <textarea class="form-control" placeholder="Realice su Consulta" required
                      name="consulta" rows="4"></textarea>
        </div>
        <div class="d-flex justify-content-center" style="margin-bottom: 5px">
            <button type="submit" class="btn btn-dark btn-lg">Enviar</button>
        </div>
    </form>
</div>
</main>

{{> footer}}