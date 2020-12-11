{{> header}}
<main class="cuerpoindex">
    <figure class="highcharts-figure">
        <div id="container">

        </div>

    </figure>
</main>

<h2 class="titulosindex  text-center"> Gráfico de costos.</h2>
<hr>


<canvas id="marksChart" width="650" height="250" class="mt-5"></canvas>

<script>
    var marksCanvas = document.getElementById("marksChart");

    var marksData = {
        labels: ["kilometros", "Combustible", "Viatico", "Peaje", "Free", "Extras"],
        datasets: [{
            label: "Costo inicial",
            backgroundColor: "rgba(300,80,0,0.3)",
            data: [{{kilometrosInicial}}, {{combustibleInicial}}, {{viaticosInicial}},{{peajesInicial}}, {{feeInicial}}, {{extrasInicial}}]
        }, {
            label: "Costo final",
            backgroundColor: "rgba(0,0,255,0.3)",
            data: [{{kilometrosFinal}}, {{combustibleFinal}}, {{viaticosFinal}}, {{peajesFinal}}, {{feeFinal}}, {{extrasFinal}}]
        }]
    };

    var radarChart = new Chart(marksCanvas, {
        type: 'radar',
        data: marksData
    });
</script>

{{> footer}}