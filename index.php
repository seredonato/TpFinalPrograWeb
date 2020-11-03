
<?php
include_once ("header.php");
?>


<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
    <img class="mySlides w3-animate-opacity w3-image" src="./img/indexFoto1.jpg" width="1500" height="600">
    <img class="mySlides w3-animate-opacity w3-image" src="./img/indexFoto2.jpg" width="1500" height="600">
    <img class="mySlides w3-animate-opacity w3-image" src="./img/indexFoto3.jpg" width="1500" height="600">
    <img class="mySlides w3-animate-opacity w3-image" src="./img/indexFoto4.jpg" width="1500" height="600">
    <img class="mySlides w3-animate-opacity w3-image" src="./img/indexFoto5.jpg" width="1500" height="600">
</header>


<div class="w3-content w3-padding" style="max-width:1564px">

    <div class="w3-container w3-padding-32" id="somos">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">¿Quiénes Somos?</h3>
        <p>Somos una compañía joven especializada en brindar soluciones logísticas para empresas, comercio y e-commerce.
            Con el objetivo de satisfacer las necesidades de cada empresa, un servicio de calidad,
            atención personalizada y tarifas competitivas.
        </p>
    </div>

    <div class="w3-container w3-padding-32" id="somos">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Choferes Destacados de la Semana</h3>
        <div class="w3-row-padding w3-grayscale">
            <div class="w3-col l3 m6 w3-margin-bottom">
                <img src="/w3images/team2.jpg" alt="John" style="width:100%">
                <h3>John Doe</h3>
                <p class="w3-opacity">CEO & Founder</p>
                <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <img src="/w3images/team1.jpg" alt="Jane" style="width:100%">
                <h3>Jane Doe</h3>
                <p class="w3-opacity">Architect</p>
                <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <img src="/w3images/team3.jpg" alt="Mike" style="width:100%">
                <h3>Mike Ross</h3>
                <p class="w3-opacity">Architect</p>
                <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
            </div>
            <div class="w3-col l3 m6 w3-margin-bottom">
                <img src="/w3images/team4.jpg" alt="Dan" style="width:100%">
                <h3>Dan Star</h3>
                <p class="w3-opacity">Architect</p>
                <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
            </div>
        </div>
    </div>

    <div class="w3-container w3-padding-32" id="contact">
        <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contacto</h3>
        <p>Realice un comentario.</p>
        <form action="/action_page.php" target="_blank">
            <input class="w3-input w3-border" type="text" placeholder="Nombre" required name="nombre">
            <input class="w3-input w3-section w3-border" type="text" placeholder="Email" required name="email">
            <input class="w3-input w3-section w3-border" type="text" placeholder="Asunto" required name="asunto">
            <textarea class="w3-input w3-section w3-border" placeholder="Comentario" required name="comentario"></textarea>
            <div class="w3-center">
                <button class="w3-button w3-black w3-section" type="submit">
                    <i class="fa fa-paper-plane"></i> Enviar
                </button>
            </div>
        </form>
    </div>

    <!-- End page content -->
</div>

<?php
include_once ("footer.php");
?>