{{> header}}

<main class="text-center cuerpoindex">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active imagencarousel">
                <img class="d-block w-100 " src="/public/images/indexfoto1.png" alt="First slide">
                <h4 class="text-center">Todos los dias cumpliendo nuestro trabajo</h4>
            </div>
            <div class="carousel-item imagencarousel">
                <img class="d-block w-100" src="/public/images/indexfoto2.png" alt="Second slide">
                <h4 class="text-center">Tomamos muchas rutas, pero solo un camino: hacer nuestro trabajo</h4>
            </div>
            <div class="carousel-item imagencarousel">
                <img class="d-block w-100" src="/public/images/indexfoto3.png" alt="Third slide">

                <h4 class="text-center">Con seguimiento de carga online. Una clave, una contraseña y es como si
                    estuvieras en el asiento del acompañante</h4>

            </div>
            <div class="carousel-item imagencarousel">
                <img class="d-block w-100" src="/public/images/indexfoto4.png" alt="Third slide">
                <h4 class="text-center">Con personal capacitado, en regla y que cumplen con los protocolos</h4>
            </div>
            <div class="carousel-item imagencarousel">
                <img class="d-block w-100" src="/public/images/indexfoto5.png" alt="Third slide">
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

    <div class="container mt-2" id="servicios">
        <h3 class="titulosindex">Servicios</h3>
        <hr>
        <p>Porque pensamos en la satisfacción de nuestros clientes, ofrecemos soluciones integrales, que
            les permiten lograr una ventaja competitiva, reduciendo tiempos y evitando el derroche de
            capitales. Para ello, ponemos a su disposición los mejores recursos humanos y tecnológicos y
            la posibilidad de adaptar cada servicio a sus necesidades. El resultado es una serie de
            flexibles y efectivas opciones de servicios, que se desarrollan en los mejores tiempos y
            con la mayor seguridad.
        </p>

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h5>Transporte y distribución</h5>
                    <img class="d-block w-100 p-2" src="/public/images/indexfoto2.png" alt="transdis">
                    <p>En Transaff nos caracterizamos por valorar el esfuerzo que nuestros clientes
                        realizan para fabricar sus productos. Es por eso que asumimos la responsabilidad
                        de trabajar con la seriedad y el compromiso necesarios para entregarlos en tiempo
                        y forma.</p>
                </div>
                <div class="col-sm">
                    <h5>Logística y almacenamiento</h5>
                    <img class="d-block w-100 p-2" src="/public/images/indexfoto3   .png" alt="logalma">
                    <p>Hemos desarrollado un sistema logístico que nos permite rastrear y enviar cargas a
                        cualquier punto del país en cuestión de horas. Nuestros depósitos cuentan con la
                        tecnología necesaria para detectar despachos pendientes y así evitar retrasos
                        innecesarios.</p>
                </div>
                <div class="col-sm">
                    <h5>Desarrollos a medida</h5>
                    <img class="d-block w-100 p-2" src="/public/images/indexfoto5.png" alt="dir">
                    <p>Con el correr de los años, hemos excedido el título de “proveedores” de nuestros clientes,
                        y nos hemos transformado en sus socios estratégicos. Esto nos ha llevado en muchos casos a
                        desarrollar nuevos centros logísticos para satisfacer necesidades incipientes.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mt-2" id="contacto">
        <h3 class="titulosindex">Contacto</h3>
        <hr>
        <form action="/pedido/guardarPedido" enctype="multipart/form-data" method="post" class="mt-3">
            <div class="form-group">
                <label for="nombreCompleto">Nombre Completo</label>
                <input type="nombre" class="form-control" placeholder="Ingrese su nombre completo" required
                       name="nombreCompleto">
            </div>
            <div class="form-row mt-4 mb-3">
                <div class="form-group col-md-6">
                    <label for="cuit">CUIT:</label>
                    <input type="number" class="form-control" placeholder="No use línea ni espaciado" required name="cuit">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" placeholder="Ingrese su Email" required name="email">
                </div>
            </div>
            <div class="form-row mt-4 mb-3">
                <div class="form-group col-md-6">
                    <label for="telefono">Telefono:</label>
                    <input type="tel" class="form-control" placeholder="Ej. 4444-4444" required name="telefono">
                </div>
                <div class="form-group col-md-6">
                    <label for="direccion">Direccion:</label>
                    <input type="text" class="form-control" placeholder="Ej. Avenida de Mayo 1000" required name="direccion">
                </div>
            </div>
            <div class="form-row mt-4 mb-3">
                <div class="form-group col-md-6">
                    <label for="contacto1">Dirección de origen:</label>
                    <input type="text" class="form-control" placeholder="Direccion de origen del envío" required
                           name="contacto1">
                </div>
                <div class="form-group col-md-6">
                    <label for="contacto2">Dirección de destino:</label>
                    <input type="text" class="form-control" placeholder="Direccion de destino del envío" required
                           name="contacto2">
                </div>
            </div>
            <div class="d-flex justify-content-center mb-3" style="margin-bottom: 5px">
                <button type="submit" class="btn btn-dark btn-lg">Enviar</button>
            </div>
        </form>
    </div>
    {{#valorPedido}}
    {{> pedidoGuardado}}
    {{/valorPedido}}

</main>


{{> footer}}