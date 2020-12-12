{{> header}}
<main class="cuerpoindex">

<h2 class="titulosindex  text-center"> Gráfico de costos</h2>
<hr>


<canvas id="marksChart" width="650" height="200" class="mt-5"></canvas>
<br>
    <br>
    <br>
    <h2 class="titulosindex  text-center"> Gráfico de barras espeficico</h2>
    <hr>
    <figure class="highcharts-figure">
    <div id="container"></div>
</figure>

</main>
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

    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: ['Kilometros', 'Combustible', 'Viaticos', 'Peajes', 'FreeFinal', 'Extras']
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Costo inicial',
            fill: "rgb(0,0,255)",
            data: [{{kilometrosInicial}}, {{combustibleInicial}}, {{viaticosInicial}},{{peajesInicial}}, {{feeInicial}}, {{extrasInicial}}]
        }, {
            name: 'Costo final',
            data: [{{kilometrosFinal}}, {{combustibleFinal}}, {{viaticosFinal}}, {{peajesFinal}}, {{feeFinal}}, {{extrasFinal}}]
        }]
    });
</script>

{{> footer}}