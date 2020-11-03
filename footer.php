<footer class="w3-center w3-black w3-padding-16">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1640.6884989672753!2d-58.56398904764693!3d-34.67043346619271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc62cc3ef7083%3A0x8867107f425fade5!2sUniversidad%20Nacional%20de%20La%20Matanza!5e0!3m2!1ses-419!2sar!4v1604349244297!5m2!1ses-419!2sar"
            width="350" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0" id="mapa"></iframe>
</footer>

<script>
    var slideIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > x.length) {
            slideIndex = 1
        }
        x[slideIndex - 1].style.display = "block";
        setTimeout(carousel, 10000); // Change image every 2 seconds
    }
</script>
</body>
</html>