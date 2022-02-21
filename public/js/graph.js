$(document).ready(function () {
    //Crear Graficas
    getData();

});


const myChart = setupNewGraph('myChart', 'line', 'Volts', 'Variación de voltaje');
const myChart1 = setupNewGraph('myChart1', 'line', 'Amp', 'Variación de Amperaje');
//const myChart2 = setupNewGraph('myChart2','line','Amp','Variación de Amperaje');
//const myChart3 = setupNewGraph('myChart3','bar','Amp','Variación de Amperaje');

function setupNewGraph(ctx, GType, GLabel, GText) {
    const _ctx = document.getElementById(ctx);
    const config = {
        type: GType,
        data: {
            datasets: [{
                label: GLabel,
                borderWidth: 3,
                fill: false,
                borderColor: '#149481',
                tension: 0.2
            }]
        },
        options: {
            scales: {
                y: {

                    grace: 2
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: GText,
                    color: "#7C110C"
                }
            }
        }
    }
    const myChart = new Chart(_ctx, config);
    return myChart;
}

function getData() {
    $.get("http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/r0001", function (data) {
        Object.values(data).reverse().forEach(values => {
            // Graficando valores de volts
            myChart.data.labels.push(values.time.substring(10));
            myChart.data.datasets[0].data.push(values.voltsValue);
            $("#lastValueVolt").val(values.time.substring(10))
            // Graficando valores de Amp
            myChart1.data.labels.push(values.time.substring(10));
            myChart1.data.datasets[0].data.push(values.ampValue);

            // myChart2.data.labels.push(values.time.substring(10));
            // myChart2.data.datasets[0].data.push(values.ampValue);

            // myChart3.data.labels.push(values.time.substring(10));
            // myChart3.data.datasets[0].data.push(values.ampValue);
            $('#LastVoltvalue').html(values.voltsValue + "V");
            $('#LastAmpvalue').html(values.ampValue + "Amp");
        });
        myChart.update();
        myChart1.update();
        // myChart2.update();
        // myChart3.update();
    });
}

// function getLastData() {
//     $.get("http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/lst/r0001", function (data) {
//         Object.values(data).forEach(values => {
//             if ($("input#lastValueVolt").val() != values.time.substring(10)) {
//                 myChart.data.labels.splice(0, 1);
//                 myChart.data.datasets[0].data.splice(0, 1);
//                 myChart.data.labels.push(values.time.substring(10));
//                 myChart.data.datasets[0].data.push(values.voltsValue);
//                 // Valores de Amp
//                 myChart1.data.labels.splice(0, 1);
//                 myChart1.data.datasets[0].data.splice(0, 1);
//                 myChart1.data.labels.push(values.time.substring(10));
//                 myChart1.data.datasets[0].data.push(values.ampValue);
//                 $("#lastValueVolt").val(values.time.substring(10));
//                 $('#LastVoltvalue').html(values.voltsValue + "V");
//                 $('#LastAmpvalue').html(values.ampValue + "Amp");
//             }
//             console.log($("input#lastValueVolt").val());

//         });
//         myChart.update();
//         myChart1.update();
//     });
// }

// setInterval('getLastData()', 4000);

setInterval(async () => {
    const res = await fetch('http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/lst/r0001').then(response => response.json());

    if ($("input#lastValueVolt").val() != res[0].time.substring(10)) {
        console.log('dentro');
        myChart.data.labels.splice(0, 1);
        myChart.data.datasets[0].data.splice(0, 1);
        myChart.data.labels.push(res[0].time.substring(10));
        myChart.data.datasets[0].data.push(res[0].voltsValue);
        // Valores de Amp
        myChart1.data.labels.splice(0, 1);
        myChart1.data.datasets[0].data.splice(0, 1);
        myChart1.data.labels.push(res[0].time.substring(10));
        myChart1.data.datasets[0].data.push(res[0].ampValue);
        $("#lastValueVolt").val(res[0].time.substring(10));
        $('#LastVoltvalue').html(res[0].voltsValue + "V");
        $('#LastAmpvalue').html(res[0].ampValue + "Amp");
    }
    myChart.update();
    myChart1.update();
    console.log($("input#lastValueVolt").val());
    console.log(res[0].time.substring(10));
}, 4000);