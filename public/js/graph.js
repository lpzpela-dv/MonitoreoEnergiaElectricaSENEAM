$(document).ready(function () {
    //Crear Graficas
    getData();

});

var myChart = setupNewGraph('myChart', 'line', 'Volts', 'Variación de voltaje');
var myChart1 = setupNewGraph('myChart1', 'line', 'Amp', 'Variación de Amperaje');
var myChart2 = setupNewGraph('myChart2', 'line', 'Amp', 'Variación de Amperaje');


//botones validaos para la grafica 
var btns = ['Volt', 'Amp', 'Watts', 'KwH', 'Fp', 'Hz'];
$('button').click(function (event) {
    console.log(this.name);
    if (btns.includes(this.id.slice(0, -1))) {
        $("#" + this.name).val(this.id.slice(0, -1));
        console.log($("#" + this.name).attr('value'));
    }
    updateData(this);
});

async function updateData(btn) {
    // $(btn).addClass("active");
    removeClass(btn.id.slice(-1))
    $(btn).addClass("active");
    let resp = await fetch('http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/hst/2').then(response => response.json());
    console.log(resp)
    switch (btn.name) {
        case "cfeVal":
            myChart.destroy();
            myChart = setupNewGraph('myChart', 'line', 'Volts', 'Variación de voltaje');
            getData(1, myChart, $("#" + btn.name).attr('value'), 1);
            break;
        case "cargaVal":
            myChart1.destroy();
            myChart1 = setupNewGraph('myChart1', 'line', 'Volts', 'Variación de voltaje');
            getData(1, myChart1, $("#" + btn.name).attr('value'));
            break;
        case "plantaCal":
            myChart2.destroy();
            myChart2 = setupNewGraph('myChart2', 'line', 'Volts', 'Variación de voltaje');
            getData(1, myChart2, $("#" + btn.name).attr('value'));
            break;
    }
}

function removeClass(id) {
    $("#Amp" + id).removeClass('active');
    $("#Watts" + id).removeClass('active');
    $("#KwH" + id).removeClass('active');
    $("#Fp" + id).removeClass('active');
    $("#Hz" + id).removeClass('active');
    $("#Volt" + id).removeClass('active');
}

function setupNewGraph(ctx, GType, GLabel, GText) {
    const _ctx = document.getElementById(ctx);
    const config = {
        type: GType,
        data: {
            datasets: [{
                label: "Fase 1",
                borderWidth: 3,
                fill: false,
                borderColor: '#F0775D',
                tension: 0.2,
                yAxisID: 'y'
            },
            {
                label: "Fase 2",
                borderWidth: 3,
                fill: false,
                borderColor: '#4AEA9F',
                // tension: 0.2,
                // yAxisID: 'y'
            },
            {
                label: "Fase 3",
                borderWidth: 3,
                fill: false,
                borderColor: '#B2F05D',
                tension: 0.2,
                yAxisID: 'y'
            }]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            stacked: false,
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    grace: 2

                },
                y1: {
                    type: 'linear',
                    display: false,
                    position: 'left',
                    grace: 2,
                    grid: {
                        drawOnChartArea: false, // only want the grid lines for one axis to show up
                    }
                },
                y2: {
                    type: 'linear',
                    display: false,
                    position: 'left',
                    grace: 2,
                    grid: {
                        drawOnChartArea: false, // only want the grid lines for one axis to show up
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: GText,
                    color: "#000000"
                }
            }
        }
    }
    const myChartTMP = new Chart(_ctx, config);
    return myChartTMP;
}

function getData(flag = null, chart = null, type = null, f = null) {

    switch (flag) {
        case 1:

            $.get("http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/hst/1", function (data) {
                console.log("segundo filtro");
                console.log(data);
                Object.values(data).reverse().forEach(values => {
                    // Graficando valores de volts
                    console.log("type: " + type);
                    switch (type) {
                        case "Amp":
                            chart.data.labels.push(values.regtime.substring(10));
                            // for (let i = 0; i < 3 + f; i++) {
                            //     let num = "Ampl" + i + f;
                            //     chart.data.datasets[i].data.push(values.AmpL1);
                            //     console.log(num + " " + values.num);
                            // }
                            chart.data.datasets[0].data.push(values.AmpL1);
                            chart.data.datasets[1].data.push(values.AmpL2);
                            chart.data.datasets[2].data.push(values.AmpL3);
                            break;
                        case "Volt":
                            chart.data.labels.push(values.regtime.substring(10));
                            chart.data.datasets[0].data.push(values.VoltL1);
                            chart.data.datasets[1].data.push(values.VoltL2);
                            chart.data.datasets[2].data.push(values.VoltL3);
                            break;
                        case "Watts":
                            chart.data.labels.push(values.regtime.substring(10));
                            chart.data.datasets[0].data.push(values.WattsL1);
                            chart.data.datasets[1].data.push(values.WattsL2);
                            chart.data.datasets[2].data.push(values.WattsL3);
                            break;
                        case "KwH":
                            chart.data.labels.push(values.regtime.substring(10));
                            chart.data.datasets[0].data.push(values.KwHL1);
                            chart.data.datasets[1].data.push(values.KwHL2);
                            chart.data.datasets[2].data.push(values.KwHL3);
                            break;
                        case "Fp":
                            chart.data.labels.push(values.regtime.substring(10));
                            chart.data.datasets[0].data.push(values.FpL1);
                            chart.data.datasets[1].data.push(values.FpL2);
                            chart.data.datasets[2].data.push(values.FpL3);
                            break;
                        case "Hz":
                            chart.data.labels.push(values.regtime.substring(10));
                            chart.data.datasets[0].data.push(values.HzL1);
                            chart.data.datasets[1].data.push(values.HzL2);
                            chart.data.datasets[2].data.push(values.HzL3);
                            break;
                    }
                    $("#lastValueVolt").val(values.regtime.substring(10));
                });
                myChart.update();
                // myChart1.update();
                // myChart2.update();
                // myChart3.update();
            });
            break;

        default:
            $.get("http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/hst/1", function (data) {
                console.log("primer filtro");
                console.log(data);
                Object.values(data).reverse().forEach(values => {
                    // Graficando valores de CFE
                    myChart.data.labels.push(values.regtime.substring(10));
                    myChart.data.datasets[0].data.push(values.VoltL1);
                    myChart.data.datasets[1].data.push(values.VoltL2);
                    myChart.data.datasets[2].data.push(values.VoltL3);
                    $("#lastValueVolt").val(values.regtime.substring(10));
                    // Graficando valores de Planta
                    myChart2.data.labels.push(values.regtime.substring(10));
                    myChart2.data.datasets[0].data.push(values.VoltL4);
                    myChart2.data.datasets[1].data.push(values.VoltL5);
                    myChart2.data.datasets[2].data.push(values.VoltL6);
                    // Graficando valores de Carga
                    myChart1.data.labels.push(values.regtime.substring(10));
                    myChart1.data.datasets[0].data.push(values.VoltL7);
                    myChart1.data.datasets[1].data.push(values.VoltL8);
                    myChart1.data.datasets[2].data.push(values.VoltL9);
                    // Graficando valores de Amp
                    // myChart1.data.labels.push(values.time.substring(10));
                    // myChart1.data.datasets[0].data.push(values.ampValue);
                    // $('#LastVoltvalue').html(values.voltsValue + "V");
                    // $('#LastAmpvalue').html(values.ampValue + "Amp");
                });
                myChart.update();
                myChart1.update();
                myChart2.update();
                // myChart3.update();
            });
            break;
    }


}

// setInterval(async () => {
//     const res = await fetch('http://localhost:8080/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/lst/r0001').then(response => response.json());

//     if ($("input#lastValueVolt").val() != res[0].time.substring(10)) {
//         console.log('dentro');
//         myChart.data.labels.splice(0, 1);
//         myChart.data.datasets[0].data.splice(0, 1);
//         myChart.data.labels.push(res[0].time.substring(10));
//         myChart.data.datasets[0].data.push(res[0].voltsValue);
//         // Valores de Amp
//         myChart1.data.labels.splice(0, 1);
//         myChart1.data.datasets[0].data.splice(0, 1);
//         myChart1.data.labels.push(res[0].time.substring(10));
//         myChart1.data.datasets[0].data.push(res[0].ampValue);
//         $("#lastValueVolt").val(res[0].time.substring(10));
//         $('#LastVoltvalue').html(res[0].voltsValue + "V");
//         $('#LastAmpvalue').html(res[0].ampValue + "Amp");
//     }
//     myChart.update();
//     myChart1.update();
//     console.log($("input#lastValueVolt").val());
//     console.log(res[0].time.substring(10));
// }, 4000);