{{> header}}
<main class="cuerpoindex">

<h2 class="titulosindex  text-center"> Gráfico de Costos</h2>
<hr>


<canvas id="marksChart" width="650" height="200" class="mt-5"></canvas>
<br>
    <br>
    <br>
    <h2 class="titulosindex  text-center"> Gráfico de Barras Específico</h2>
    <hr>
    <figure class="highcharts-figure">
    <div id="container"></div>
</figure>

</main>
<script>
    var marksCanvas = document.getElementById("marksChart");

    var marksData = {
        labels: ["kilometros", "Combustible", "Viatico", "Peaje", "Fee", "Extras"],
        datasets: [{
            label: "Costo Inicial",
            backgroundColor: "rgba(300,80,0,0.3)",
            data: [{{kilometrosInicial}}, {{combustibleInicial}}, {{viaticosInicial}},{{peajesInicial}}, {{feeInicial}}, {{extrasInicial}}]
        }, {
            label: "Costo Final",
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
            categories: ['Kilometros', 'Combustible', 'Viaticos', 'Peajes', 'Fee', 'Extras']
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Costo Inicial',
            fill: "rgb(0,0,255)",
            data: [{{kilometrosInicial}}, {{combustibleInicial}}, {{viaticosInicial}},{{peajesInicial}}, {{feeInicial}}, {{extrasInicial}}]
        }, {
            name: 'Costo Final',
            data: [{{kilometrosFinal}}, {{combustibleFinal}}, {{viaticosFinal}}, {{peajesFinal}}, {{feeFinal}}, {{extrasFinal}}]
        }]
    });
</script>

{{> footer}}