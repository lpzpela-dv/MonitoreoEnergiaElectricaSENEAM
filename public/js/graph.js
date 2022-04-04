// const { set } = require("lodash");

$(document).ready(function () {
    getData();
});

var myChart = setupNewGraph('myChart', 'line', 'Volts', 'CFE');
var myChart1 = setupNewGraph('myChart1', 'line', 'Amp', 'Planta Generadora');
var myChart2 = setupNewGraph('myChart2', 'line', 'Amp', 'Carga');


//botones validaos para la grafica 
var btns = ['Volt', 'Amp', 'Watts', 'KwH', 'Fp', 'Hz'];
$('button').click(function (event) {
    if (btns.includes(this.id.slice(0, -1))) {
        $("#" + this.name).val(this.id.slice(0, -1));
    }
    updateData(this);
});

async function updateData(btn) {
    removeClass(btn.id.slice(-1))
    $(btn).addClass("active");
    switch (btn.name) {
        case "cfeVal":
            myChart.destroy();
            myChart = setupNewGraph('myChart', 'line', 'Volts', 'CFE');
            getData(1, myChart, $("#" + btn.name).attr('value'), 1);
            break;
        case "plantaVal":
            myChart1.destroy();
            myChart1 = setupNewGraph('myChart1', 'line', 'Volts', 'Planta Generadora');
            getData(1, myChart1, $("#" + btn.name).attr('value'), 4);
            break;
        case "cargaVal":
            myChart2.destroy();
            myChart2 = setupNewGraph('myChart2', 'line', 'Volts', 'Carga');
            getData(1, myChart2, $("#" + btn.name).attr('value'), 7);
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
                    grace: 2,
                    beginAtZero: true

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

            $.get("http://localhost/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/hst/1", function (data) {
                Object.values(data).reverse().forEach(values => {
                    // Graficando valores de volts
                    switch (type) {
                        case "Amp":
                            chart.data.labels.push(values.regtime.substring(10));
                            for (let i = 0; i < 3; i++) {
                                let num = i + f;
                                chart.data.datasets[i].data.push(values["AmpL" + num]);
                            }
                            break;
                        case "Volt":
                            chart.data.labels.push(values.regtime.substring(10));
                            for (let i = 0; i < 3; i++) {
                                let num = i + f;
                                chart.data.datasets[i].data.push(values["VoltL" + num]);
                            }
                            break;
                        case "Watts":
                            chart.data.labels.push(values.regtime.substring(10));
                            for (let i = 0; i < 3; i++) {
                                let num = i + f;
                                chart.data.datasets[i].data.push(values["WattsL" + num]);
                            }
                            break;
                        case "KwH":
                            chart.data.labels.push(values.regtime.substring(10));
                            for (let i = 0; i < 3; i++) {
                                let num = i + f;
                                chart.data.datasets[i].data.push(values["KwHL" + num]);
                            };
                            break;
                        case "Fp":
                            chart.data.labels.push(values.regtime.substring(10));
                            for (let i = 0; i < 3; i++) {
                                let num = i + f;
                                chart.data.datasets[i].data.push(values["FpL" + num]);
                            }
                            break;
                        case "Hz":
                            chart.data.labels.push(values.regtime.substring(10));
                            for (let i = 0; i < 3; i++) {
                                let num = i + f;
                                chart.data.datasets[i].data.push(values["HzL" + num]);
                            }
                            break;
                    }
                    $("#lastValue").val(values.regtime.substring(10));
                });
                chart.update();
            });
            break;

        default:
            let cont = 0;
            $.get("http://localhost/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/hst/1", function (data) {
                Object.values(data).reverse().forEach(values => {
                    cont = cont + 1;
                    myChart.data.labels.push(values.regtime.substring(10));
                    myChart2.data.labels.push(values.regtime.substring(10));
                    myChart1.data.labels.push(values.regtime.substring(10));
                    for (let i = 0; i < 3; i++) {
                        myChart.data.datasets[i].data.push(values['VoltL' + (i + 1)]);
                        myChart1.data.datasets[i].data.push(values['VoltL' + (i + 4)]);
                        myChart2.data.datasets[i].data.push(values['VoltL' + (i + 7)]);
                    }
                    $("#lastValue").val(values.regtime.substring(10));
                });
                validandoContactor([data[cont - 1]]);
                setDieselValue(data[cont - 1]);
                myChart.update();
                myChart1.update();
                myChart2.update();
            });
            break;
    }


}

function autUpdate(chart = null, type = null, f = null, data = null) {

    chart.data.labels.splice(0, 1);
    //Eliminar el utlimo
    chart.data.datasets[0].data.splice(0, 1);
    chart.data.datasets[1].data.splice(0, 1);
    chart.data.datasets[2].data.splice(0, 1);
    //Agregar datos
    data.forEach(values => {
        // Graficando valores de volts
        switch (type) {
            case "Amp":
                chart.data.labels.push(values.regtime.substring(10));
                for (let i = 0; i < 3; i++) {
                    let num = i + f;
                    chart.data.datasets[i].data.push(values["AmpL" + num]);
                }
                break;
            case "Volt":
                chart.data.labels.push(values.regtime.substring(10));
                for (let i = 0; i < 3; i++) {
                    let num = i + f;
                    chart.data.datasets[i].data.push(values["VoltL" + num]);
                }
                break;
            case "Watts":
                chart.data.labels.push(values.regtime.substring(10));
                for (let i = 0; i < 3; i++) {
                    let num = i + f;
                    chart.data.datasets[i].data.push(values["WattsL" + num]);
                }
                break;
            case "KwH":
                chart.data.labels.push(values.regtime.substring(10));
                for (let i = 0; i < 3; i++) {
                    let num = i + f;
                    chart.data.datasets[i].data.push(values["KwHL" + num]);
                };
                break;
            case "Fp":
                chart.data.labels.push(values.regtime.substring(10));
                for (let i = 0; i < 3; i++) {
                    let num = i + f;
                    chart.data.datasets[i].data.push(values["FpL" + num]);
                }
                break;
            case "Hz":
                chart.data.labels.push(values.regtime.substring(10));
                for (let i = 0; i < 3; i++) {
                    let num = i + f;
                    chart.data.datasets[i].data.push(values["HzL" + num]);
                }
                break;
        }
    });
    chart.update();

}

function setDieselValue(data) {
    console.log(data);
    $("#litrosVal").html(data.volDiesel);
}

function validandoContactor(data = null) {
    let htmlCFE = "";
    let htmlPlanta = "";
    if (data == null) {
        $.get("http://localhost/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/lst", function (data) {
            data.forEach(values => {
                if (values.stCFE == 1) {
                    htmlCFE = '<div class="info-box bg-success"><span class="info-box-icon"><i class="fa-solid fa-shuffle"></i></span><div class="info-box-content"><span class="info-box-text">Contactor CFE</span><span class="info-box-number">ACTIVADO</span></div></div>';
                } else {
                    if (values.stCFE == 0) {
                        htmlCFE = '<div class="info-box bg-danger"><span class="info-box-icon"><i class="fa-solid fa-shuffle"></i></span><div class="info-box-content"><span class="info-box-text">Contactor CFE</span><span class="info-box-number">DESACTIVADO</span></div></div>';
                    }
                }
                if (values.stPlanta == 1) {
                    htmlPlanta = '<div class="info-box bg-success"><span class="info-box-icon"><i class="fa-solid fa-shuffle"></i></span><div class="info-box-content"><span class="info-box-text">Contactor Planta</span><span class="info-box-number">ACTIVADO</span></div></div>';
                } else {
                    if (values.stPlanta == 0) {
                        htmlPlanta = '<div class="info-box bg-danger"><span class="info-box-icon"><i class="fa-solid fa-shuffle"></i></span><div class="info-box-content"><span class="info-box-text">Contactor Planta</span><span class="info-box-number">DESACTIVADO</span></div></div>';
                    }
                }
            });
        });
    } else {
        data.forEach(values => {
            if (values.stCFE == 1) {
                htmlCFE = '<div class="info-box bg-success"><span class="info-box-icon"><i class="fa-solid fa-shuffle"></i></span><div class="info-box-content"><span class="info-box-text">Contactor CFE</span><span class="info-box-number">ACTIVADO</span></div></div>';
            } else {
                if (values.stCFE == 0) {
                    htmlCFE = '<div class="info-box bg-danger"><span class="info-box-icon"><i class="fa-solid fa-shuffle"></i></span><div class="info-box-content"><span class="info-box-text">Contactor CFE</span><span class="info-box-number">DESACTIVADO</span></div></div>';
                }
            }
            if (values.stPlanta == 1) {
                htmlPlanta = '<div class="info-box bg-success"><span class="info-box-icon"><i class="fa-solid fa-shuffle"></i></span><div class="info-box-content"><span class="info-box-text">Contactor Planta</span><span class="info-box-number">ACTIVADO</span></div></div>';
            } else {
                if (values.stPlanta == 0) {
                    htmlPlanta = '<div class="info-box bg-danger"><span class="info-box-icon"><i class="fa-solid fa-shuffle"></i></span><div class="info-box-content"><span class="info-box-text">Contactor Planta</span><span class="info-box-number">DESACTIVADO</span></div></div>';
                }
            }
        });
    }

    $("#contCFE").html(htmlCFE);
    $("#contPlanta").html(htmlPlanta);
}

setInterval(() => {
    $.get("http://localhost/MonitoreoEnergiaElectricaSENEAM/public/api/energy/data/lst", function (data) {
        if (data[0].regtime.substring(10) != $("input#lastValue").val()) {
            //Envíar los charts al update data
            autUpdate(myChart, $("#cfeVal").attr('value'), 1, data);
            autUpdate(myChart1, $("#plantaVal").attr('value'), 4, data);
            autUpdate(myChart2, $("#cargaVal").attr('value'), 7, data);
            $("#lastValue").val(data[0].regtime.substring(10));
            console.log(data[0].regtime.substring(10))
        }
        console.log("Hora guardada: " + $("input#lastValue").val());
        console.log("Ultima Hora: " + data[0].regtime.substring(10));
        validandoContactor(data);
        setDieselValue(data);

    });
}, 5000);
